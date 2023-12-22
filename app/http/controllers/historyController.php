<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class historyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =history::orderBy('history', 'asc')->get();
        return view('dashboard.history.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('history', $request->history);
        Session::flash('kandungan', $request->kandungan);

        $request->validate(
            [
                'history' => 'required',
                'kandungan' => 'required',
            ],
            [
                'history.required' => 'History Compulsory',
                'kandungan.required' => 'Kandungan Compulsory',
            ]
        );

        $data = [
            'history' => $request->history,
            'kandungan' => $request->kandungan
        ];
        history::create($data);

        return redirect()->route('history.index')->with('success', 'history Added');
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
        $data = history::where('id', $id)->first();
        return view('dashboard.history.edit')->with('data', $data);
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
                'history' => 'required',
                'kandungan' => 'required',
            ],
            [
                'history.required' => 'History Compulsory',
                'kandungan.required' => 'Kandungan Compulsory',
            ]
        );

        $data = [
            'history' => $request->history,
            'kandungan' => $request->kandungan
        ];
        history::where('id', $id)->update($data);

        return redirect()->route('history.index')->with('success', 'Data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        history::where('id', $id)->delete();
        return redirect()->route('history.index')->with('success', 'history Delete');
    }
}
