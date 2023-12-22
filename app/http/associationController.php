<?php

namespace App\Http\Controllers;


use App\Models\association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class associationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = association::orderBy('association', 'asc')->get();
        return view('dashboard.association.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.association.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('association', $request->association);
        Session::flash('jawatan', $request->jawatan);
        Session::flash('content', $request->content);

        $request->validate(
            [
                'association' => 'required',
                'jawatan' => 'required',
                'content' => 'required',
            ],
            [
                'association.required' => 'Association Compulsory',
                'jawatan.required' => 'Jawatan Compulsory',
                'content.required' => 'Content Compulsory',
            ]
        );

        $data = [
            'association' => $request->association,
            'jawatan'=> $request->jawatan,
            'content' => $request->content
        ];
        association::create($data);

        return redirect()->route('association.index')->with('success', 'Association Add');
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
        $data = association::where('id', $id)->first();
        return view('dashboard.association.edit')->with('data', $data);
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
                'association' => 'required',
                'jawatan' => 'required',
                'content' => 'required',
            ],
            [
                'association.required' => 'Association Compulsory',
                'jawatan.required' => 'Jawatan Compulsory',
                'content.required' => 'Content Compulsory',
            ]
        );

        $data = [
            'association' => $request->association,
            'jawatan'=> $request->jawatan,
            'content' => $request->content
        ];
        association::where('id', $id)->update($data);

        return redirect()->route('association.index')->with('success', 'association Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        association::where('id', $id)->delete();
        return redirect()->route('association.index')->with('success', 'association Delete');
    }
}
