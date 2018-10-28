<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Reservation;
use App\Service;

class ReservationController extends Controller
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
            ->where('status', "Pending")
            ->get();


        $services = DB::table('reservation_service as rs')
            ->join('service as s', 'rs.service_id', '=', 's.id')
            ->join('service_type as st', 'st.id', '=', 's.id')
            ->get();

        //dd($services);
        return view('reservation/index', ['reservations' => $reservations, 'services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::join('service_type as st', 'service.servicetype_id', '=', 'st.id')->get();
        $reservation = Reservation::all();
        return view('reservation/create', ['services' => $services]);
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
        $reserve = Reservation::find($id);
        $r = DB::table('reservation')
            ->count();
        // Redirect to hospital list if updating hospital wasn't existed
        if ($reserve == null || $r == 0) {
            return redirect()->intended('/reservation');
        }

        return view('reservation/edit', ['reserve' => $reserve]);
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
        $reserve = Reservation::findOrFail($id);
        $this->validateInput($request);

        $keys = ['status'];
        $input = $this->createQueryInput($keys, $request);

        Reservation::where('id', $id)
            ->update($input);

        return redirect()->intended('/reservation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::where('id', $id)->delete();
         return redirect()->intended('/reservation');
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
