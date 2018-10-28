<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\TherapistPosition;

class TherapistPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = DB::table('therapist_position as tp')
        ->select('tp.*')
        ->paginate(20);

        return view('therapist-position/index', ['positions' => $positions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = TherapistPosition::all();
        return view('therapist-position/create', ['positions' => $positions]);
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
        $keys = ['therapistposition'];
        $input = $this->createQueryInput($keys, $request);
        TherapistPosition::create($input);

        return redirect()->intended('/therapist-position');
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
        $position = TherapistPosition::find($id);
        $ther = DB::table('therapist_position')
            ->count();
        // Redirect to hospital list if updating hospital wasn't existed
        if ($position == null || $ther == 0) {
            return redirect()->intended('/therapist-position');
        }
        
        return view('therapist-position/edit', ['position' => $position]);
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
        $position = TherapistPosition::findOrFail($id);
        $this->validateInput($request);

        $keys = ['therapistposition'];
        $input = $this->createQueryInput($keys, $request);

        TherapistPosition::where('id', $id)
            ->update($input);

        return redirect()->intended('/therapist-position');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TherapistPostion::where('id', $id)->delete();
         return redirect()->intended('/therapist-position');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'therapistposition' => 'required|max:255'
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
