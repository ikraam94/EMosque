<?php

namespace App\Http\Controllers;

use App\Models\activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class activityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = activity::orderBy('activity', 'asc')->get();
        return view('dashboard.activity.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('activity', $request->activity);
        Session::flash('starting_date', $request->starting_date);
        Session::flash('ending_date', $request->ending_date);
        Session::flash('content', $request->content);

        $request->validate(
            [
                'activity' => 'required',
                'starting_date' => 'required',
                'content' => 'required',
            ],
            [
                'activity.required' => 'Activity Compulsory',
                'starting_date.required' => 'Starting Date Compulsory',
                'content.required' => 'Content Compulsory',
            ]
        );

        $data = [
            'activity' => $request->activity,
            'starting_date'=> $request->starting_date,
            'ending_date'=> $request->ending_date,
            'content' => $request->content
        ];
        activity::create($data);

        return redirect()->route('activity.index')->with('success', 'Activity Add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = activity::where('id', $id)->first();
        return view('dashboard.activity.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'activity' => 'required',
                'starting_date' => 'required',
                'content' => 'required',
            ],
            [
                'activity.required' => 'Activity Compulsory',
                'starting_date.required' => 'Starting Date Compulsory',
                'content.required' => 'Content Compulsory',
            ]
        );

        $data = [
            'activity' => $request->activity,
            'starting_date'=> $request->starting_date,
            'ending_date'=> $request->ending_date,
            'content' => $request->content
        ];
        activity::where('id', $id)->update($data);

        return redirect()->route('activity.index')->with('success', 'Activity Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        activity::where('id', $id)->delete();
        return redirect()->route('activity.index')->with('success', 'Activity Delete');
    }
}
