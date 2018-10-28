<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\WalkIn;
use App\Room;
use App\Therapist;
use App\Service;

class WalkInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walkins = DB::table('walkin as w')
            ->join('room as r', 'r.id', '=', 'w.room_id')
            ->join('therapist as t', 't.id', '=', 'w.therapist_id')
            ->get();

        $services = DB::table('walkin_service as ws')
            ->join('service as s', 's.id', '=', 'ws.service_id')
            ->join('service_type as st', 'st.id', '=', 's.servicetype_id')
            ->get();

        //dd($walkins);
        
        return view('walk-in/index', ['walkins' => $walkins, 'services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $therapists = Therapist::all();
        $services = DB::table('service as s')
            ->join('service_type as st', 'st.id', '=', 's.id')
            ->get();
        return view('walk-in/create', ['rooms' => $rooms, 'therapists' => $therapists, 'services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        $keys = ['fullname', 'therapist_id', 'service_id', 'room_id', 'contactnumber', 'email'];
        $input = $this->createQueryInput($keys, $request);
        Therapist::create($input);

        return redirect()->intended('/therapist');
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
        //
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
}
