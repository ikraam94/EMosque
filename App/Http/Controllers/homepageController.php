<?php

namespace App\Http\Controllers;

use App\Models\homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class homepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = homepage::orderBy('title', 'asc')->get();
        return view('dashboard.homepage.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.homepage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('content', $request->content);

        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Title Compulsory',
                'content.required' => 'Content Compulsory',
            ]
        );

        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        homepage::create($data);

        return redirect()->route('homepage.index')->with('success', 'Data Add');
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
        $data = homepage::where('id', $id)->first();
        return view('dashboard.homepage.edit')->with('data', $data);
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
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Title Compulsory',
                'content.required' => 'Content Compulsory',
            ]
        );

        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        homepage::where('id', $id)->update($data);

        return redirect()->route('homepage.index')->with('success', 'Data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        homepage::where('id', $id)->delete();
        return redirect()->route('homepage.index')->with('success', 'Data Delete');
    }
}
