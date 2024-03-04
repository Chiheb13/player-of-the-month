<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teamsCount = DB::table('voters')->count();
        $compititionsCount = DB::table('compititions')->count();
        $playersCount = DB::table('players')->count();
        $votersCount = DB::table('voters')->count();

        return view('auth.dashboard', compact('teamsCount','compititionsCount', 'playersCount', 'votersCount'));
    }
}
