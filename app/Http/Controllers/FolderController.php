<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FolderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
        $this->middleware('roles:admin|manager')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Folder::filter($request->all())->with('theme')->get();

        return response($data);
        return view('folders.index', compact('data'));

    }

    public function getFoldersByThemes(Request $request)
    {

        $data = Folder::where('theme_id', $request->theme_id)->get();

        return response($data, 200);

        return view('themes.index', compact('data'));

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

        return view("folders.create", ['themes' => $themes, 'technologies' => $technologies]);

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
            'theme_id' => 'required',
            // 'technology_id' => 'required',

        ]);
        error_log('******************************');
        error_log($request);
// return $request;
        $data = Folder::create($request->all());
        return response($data);

        return redirect()->route('folders.index')
            ->with('success', 'Folder created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        return view('folders.show', compact('folder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        return view('folders.edit', compact('folder'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $folder->update($request->all());
        return response($folder);
        return redirect()->route('folders.index')
            ->with('success', 'Folder updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        $folder->delete();
        return response('Folder deleted successfully', 200);
        return redirect()->route('folders.index')
            ->with('success', 'Folder deleted successfully');

    }
}