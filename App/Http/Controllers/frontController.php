<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\activity;
use App\Models\homepage;
use App\Models\association;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        $homepage_data = homepage::orderBy('title', 'asc')->get();
        $history_data = history::orderBy('history', 'asc')->get();
        $activity_data = activity::orderBy('activity', 'asc')->get();
        $association_data = association::orderBy('association', 'asc')->get();

        return view('front.index')->with([

            'homepage' => $homepage_data,
            'activity' => $activity_data,
            'history' =>$history_data,
            'association' => $association_data,
        ]);
    }
}
