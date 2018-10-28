<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Service;
use App\ServiceType;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('service as s')
        ->leftjoin('service_type as st', 's.servicetype_id', '=', 'st.id')
        ->select('st.*', 's.*')
        ->paginate(20);

        return view('service/index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ServiceType::all();
        $services = Service::all();
        return view('service/create', ['types' => $types, 'services'=> $services]);
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
        $keys = ['servicename', 'servicetype_id', 'serviceprice', 'description'];
        $input = $this->createQueryInput($keys, $request);
        Service::create($input);

        return redirect()->intended('/service');
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
        $service = Service::find($id);
        $serv = DB::table('service')
            ->count();
        // Redirect to hospital list if updating hospital wasn't existed
        if ($service == null || $serv == 0) {
            return redirect()->intended('/service');
        }

        $types = ServiceType::all();
        return view('service/edit', ['service' => $service, 'types'=>$types]);
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
        $service = Service::findOrFail($id);
        $this->validateInput($request);

        $keys = ['servicename', 'servicetype_id', 'serviceprice', 'description'];
        $input = $this->createQueryInput($keys, $request);

        Service::where('id', $id)
            ->update($input);

        return redirect()->intended('/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id', $id)->delete();
         return redirect()->intended('/service');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'servicename' => 'required|max:255',
            'servicetype_id' => 'required',
            'serviceprice' => 'required|numeric',
            'description' => 'required|max:8000'
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
