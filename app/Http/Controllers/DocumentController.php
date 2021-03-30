<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('file-upload');

        $data = Document::all();
        return response($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = DB::table('themes')->get();
        $technologies = DB::table('technologies')->get();
        $users = DB::table('users')->get();
        $folders = DB::table('folders')->get();

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
            'name' => 'required',
            'language' => 'required',

            'format',

            'path',

            'user_id' => 'required',

            'folder_id' => 'required',

            'file' => 'required|mimes:csv,txt,xlx,xls,pdf',

        ]);

        $name = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
        $ex = $request->file('file')->getClientOriginalName();
    
        $extension = \File::extension($ex);
        $path = $request->file('file')->store('public/files');

        $document = new Document;

        $document->name = $name;
        $document->path = $path;
        $document->language = $request->language;
        $document->format = $extension;
        $document->user_id = $request->user_id;
        $document->folder_id = $request->folder_id;

        $document->save();
        // return redirect('document')->with('status', 'File Has been uploaded successfully in laravel 8');
        return 'done';
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

            'format' => 'required',

            'path' => 'required',

            'user_id' => 'required',

            'folder_id' => 'required',

        ]);

        $document->update($request->all());
        return response($document);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return response('Document deleted successfully', 200);

    }
}