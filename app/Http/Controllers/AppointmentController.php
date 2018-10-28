<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Reservation;
use App\Room;
use App\Therapist;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = DB::table('reservation as r')
            ->join('users as u', 'r.users_id', '=', 'u.id')
            ->where('status', "Approved")
            ->get();
        
        $therapists = DB::table('reservation_therapist as rt')
            ->join('therapist as t', 'rt.therapist_id', '=', 't.id')
            ->get();

        $services = DB::table('reservation_service as rs')
            ->join('service as s', 'rs.service_id', '=', 's.id')
            ->join('service_type as st', 'st.id', '=', 's.id')
            ->get();

        //dd($services);
        return view('appointment/index', ['reservations' => $reservations, 'therapists' => $therapists, 'services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $appointment = Reservation::find($id);
        $re = DB::table('reservation')
            ->count();
            
        if ($appointment == null || $re == 0) {
            return redirect()->intended('/appointment');
        }

        $therapists = Therapist::all();
        $rooms = Room::all();
        dd($re);
        //return view('appointment/edit', ['appointment' => $appointment, 'therapist' => $therapist, 'rooms'=>$rooms]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }    

    private function validateInput($request) {
        $this->validate($request, [
            'status' => 'required'
        ]);
    }
    
    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}
