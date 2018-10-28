<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserves = DB::table('reservation as r')
            ->where('status', "Accepted")
            ->whereDate('appointment_date', Carbon::today())
            ->get();

        return view('/', ['reserves' => $reserves]);
    }
}
