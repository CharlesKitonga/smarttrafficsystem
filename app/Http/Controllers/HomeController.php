<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportOffense;
use Auth;

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
        //fetch driver licence
        $licence = Auth::user();
        //dd($driverlicence);

        $offenses = ReportOffense::with('offense')->where(['driver_licence' => $licence->driver_licence])->orderBy('id', 'DESC')->get();
        //dd($offenses);
        
        return view('index', compact('offenses'));
    }
}
