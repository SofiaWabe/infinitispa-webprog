<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\ServiceType;
use App\ServiceCategory;

class ServiceDurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = DB::table('service_type as st')
        ->leftjoin('service_category as sc', 'st.servicecategory_id', '=', 'sc.id')
        ->select('st.*', 'sc.*')
        ->paginate(20);

        return view('service-duration/index', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ServiceType::all();
        $categorys = ServiceCategory::all();
        return view('service-duration/create', ['types' => $types, 'categorys'=> $categorys]);
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
        $keys = ['servicetypename', 'servicecategory_id', 'duration'];
        $input = $this->createQueryInput($keys, $request);
        ServiceType::create($input);

        return redirect()->intended('/service-duration');
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
        $duration = ServiceType::find($id);
        $dur = DB::table('service_type')
            ->count();
            
        if ($duration == null || $dur == 0) {
            return redirect()->intended('/service-duration');
        }

        $categorys = ServiceCategory::all();
        return view('service-duration/edit', ['duration' => $duration, 'categorys'=>$categorys]);
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
        $duration = ServiceType::findOrFail($id);
        $this->validateInput($request);

        $keys = ['servicetypename', 'servicecategory_id', 'duration'];
        $input = $this->createQueryInput($keys, $request);

        ServiceType::where('id', $id)
            ->update($input);

        return redirect()->intended('/service-duration');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceType::where('id', $id)->delete();
         return redirect()->intended('/service-duration');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'servicetypename' => 'required|max:255',
            'servicecategory_id' => 'required',
            'duration' => 'required|numeric'
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
