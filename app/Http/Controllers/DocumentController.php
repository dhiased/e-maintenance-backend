<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Folder;
use App\Models\Technology;
use App\Models\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

// use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
        $this->middleware('roles:admin|manager')->except('index', 'documentCounter');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view('file-upload');
        // return Document::with('folder.theme')->get();
        // return ($request->all());
        $data = Document::filter($request->all())->with('folder.theme.technology', 'user')->get();
        return response(($data));

    }

    public function documentCounter()
    {

        $data = Document::all()->count();
        return response($data, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    //
    {
        $themes = DB::table('themes')->get();
        $technologies = DB::table('technologies')->get();
        $users = DB::table('users')->get();
        // $folders = DB::table('folders')->get();
        $folders = Folder::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name',
            'language' => 'required',

            'format',

            'path',

            'user_id',
            // 'technology_id' => 'required',

            'folder_id' => "required_if:folder_name,==,null", //required if folder_name == null
            'folder_name' => 'required_if:folder_id,==,null|unique:folders,name', // required if folder_id == null
            'theme_id' => 'required_if:folder_id,==,null', //required if folder_id == null

            'file' => 'required',

        ]);
        if ($request->folder_id != null) {
            $name = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
            $ex = $request->file('file')->getClientOriginalName();

            $extension = \File::extension($ex);
            $destination_path = 'public';

            // $folder = new Folder ;
            // $folder->name = $name;
            // $theme = Theme::all();
            // $technology = Technology::all();

            $folder = Folder::FindOrfail($request->folder_id);
            $technology = Technology::FindOrfail($request->technology_id);
            $theme = Theme::FindOrfail($request->theme_id);

            // $t = Theme::FindOrfail($request->theme_id);
            // $mydate = Carbon::now();

            $mydate = Carbon::now()->toDateTimeString();
            $now = date('F j, Y, h-i-s a');

            $my_path = ($destination_path . '/' . $technology->name . '/' . $theme->name . '/' . $folder->name);
            $path = $request->file('file')->storeAs($my_path, $name . '-' . $now . '.' . $extension);
            $pathWithOutPublic = substr($path, 7);
            $document = new Document;

            $document->name = $name;
            $document->path = $pathWithOutPublic;
            $document->language = $request->language;
            $document->format = $extension;
            // $document->user_id = $request->user_id;
            $document->user_id = auth()->user()->id;

            $document->folder_id = $request->folder_id;

            $document->save();
            $document->setAttribute('user', $document->user);

        } else {

            $myFolder = new Folder;
            $myFolder->name = $request->folder_name;
            $myFolder->theme_id = $request->theme_id;
            $myFolder->save();

            $name = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
            $ex = $request->file('file')->getClientOriginalName();

            $extension = \File::extension($ex);
            $destination_path = 'public';

            $theme = $myFolder->theme()->first();
            $technology = $theme->technology()->first();

            $mydate = Carbon::now()->toDateTimeString();
            $now = date('F j, Y, h-i-s a');

            $my_path = ($destination_path . '/' . $technology->name . '/' . $theme->name . '/' . $myFolder->name);
            $path = $request->file('file')->storeAs($my_path, $name . '-' . $now . '.' . $extension);
            $pathWithOutPublic = substr($path, 7);
            $document = new Document;

            $document->name = $name;
            $document->path = $pathWithOutPublic;
            $document->language = $request->language;
            $document->format = $extension;

            // $document->user_id = $request->user_id;
            $document->user_id = auth()->user()->id;

            $document->folder_id = $myFolder->id;

            $document->save();
            $document->setAttribute('user', $document->user);

        }
        // return redirect('document')->with('status', 'File Has been uploaded successfully in laravel 8');
        return response()->json([
            'success' => true,
            'message' => 'Document created successfully',
            'data' => $document,
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required',
            'language' => 'required',

            // 'format' => 'required',

            // 'path' => 'required',

            // 'user_id' => 'required',

        ]);

        $document->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Document updated successfully',
            'data' => $document,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document, Request $request)
    {

        if (Storage::exists($document->path)) {
            Storage::delete($document->path);
            $document->delete();
            return response('Document deleted successfully', 200);

        } else {
            return response('Document does not exists.', 200);

        }
        // File::delete($document);

    }
}