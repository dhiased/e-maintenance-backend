<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use View;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the technologies
        // $technologies = Technology::all();

        // load the view and pass the technologies
        // return view('index', compact('technologies'));

        $data = Technology::all();
        return response($data, 200);

        return view('technologies.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technologies.create');

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

        ]);

        $data = Technology::create($request->all());
        return response($data);
        return redirect()->route('technologies.index')
            ->with('success', 'Technology created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('technologies.show', compact('technology'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit', compact('technology'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $technology->update($request->all());
        return response($technology);
        return redirect()->route('technologies.index')
            ->with('success', 'Technology updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
return response ('Technology deleted successfully' , 200);
        return redirect()->route('technologies.index')
            ->with('success', 'Technology deleted successfully');

    }
}