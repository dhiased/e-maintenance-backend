<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Theme::all();

        return response($data, 200);
        return view('themes.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *@param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = DB::table('technologies')->get();
        return response(['technologies' => $technologies]);

        return view("themes.create", ['technologies' => $technologies]);

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
            'technology_id' => 'required',

        ]);
        error_log('******************************');
        error_log($request);
        // return $request;
        $data = Theme::create($request->all());
        return response($data);
        return redirect()->route('themes.index')
            ->with('success', 'Theme created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $theme->update($request->all());
        return response($theme);
        return redirect()->route('themes.index')
            ->with('success', 'Theme updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return response('Theme deleted successfully',200);
        return redirect()->route('themes.index')
            ->with('success', 'Theme deleted successfully');

    }
}