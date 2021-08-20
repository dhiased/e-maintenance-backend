<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('roles:admin|manager')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = Report::filter($request->all())->with('technology', 'user')->get();

        return response($data, 200);

    }

    public function reportCounter()
    {

        $data = Report::all()->count();
        return response($data, 200);

    }

    public function getReportsByTech(Request $request)
    {

        $data = Report::where('technology_id', $request->technology_id)->with('user')->get();
        // if ($request->technology_id == null) {
        //     $data = Report::all()->get();

        //     return response($data, 200);

        // }

        return response($data, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = DB::table('technologies')->get();
        $users = DB::table('users')->get();
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
            'title' => 'required',
            'description' => 'required',
            'technology_id' => 'required',
            // 'user_id',

        ]);
        // return auth()->user()->id;

        // $report = new Report;

        // $technology = Technology::FindOrfail($request->technology_id);

        // $report->technology_id = $technology;

        // $report->title = $request->title;
        // $report->description = $request->description;

        // $report->technology_id = $request->technology_id;
        // $report->user_id = auth()->user()->id;

        $data = Report::create($request->all());
        $data->user_id = auth()->user()->id;
        $data->save();

        return response($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        $report->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Report updated successfully',
            'data' => $report,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return response('Report deleted successfully', 200);

    }
}