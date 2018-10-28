<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\LocationRate;
use App\Service;

class LocationRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = DB::table('location_rate as lr')
            ->join('service as s', 'lr.service_id', '=', 's.id')
            ->join('service_type as st', 'st.id', '=', 's.servicetype_id')
            ->groupBy('lr.locationrate')
            ->select('lr.*', 's.*', 'st.duration')
            ->paginate(1000);
        
        $locations = DB::table('location_rate as lr')
            ->join('service as s', 'lr.service_id', '=', 's.id')
            ->join('service_type as st', 'st.id', '=', 's.servicetype_id')
            ->select('lr.*', 's.*')
            ->paginate(1000);

        return view('location-rate/index', ['rates' => $rates, 'locations' => $locations]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('location-rate/create', ['services' => $services]);
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
        $keys = ['service_id', 'barangay', 'city', 'locationrate'];
        $input = $this->createQueryInput($keys, $request);
        LocationRate::create($input);

        return redirect()->intended('/location-rate');
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
        LocationRate::where('id', $id)->delete();
        return redirect()->intended('/location-rate');
   }

   private function validateInput($request) {
       $this->validate($request, [
           'service_id' => 'required',
           'barangay' => 'required',
           'city' => 'required',
           'locationrate' => 'required|numeric'
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
