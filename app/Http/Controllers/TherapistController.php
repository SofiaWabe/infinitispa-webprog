<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\TherapistPosition;
use App\Therapist;

class TherapistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $therapists = DB::table('therapist as t')
        ->join('therapist_position as tp', 't.therapistposition_id', '=', 'tp.id')
        ->select('t.*', 'tp.*')
        ->paginate(20);

        return view('therapist/index', ['therapists' => $therapists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = TherapistPosition::all();
        return view('therapist/create', ['positions' => $positions]);
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
        $keys = ['fullname', 'therapistposition_id', 'address', 'contactnumber', 'email'];
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
        $therapist = Therapist::find($id);
        $ther = DB::table('therapist')
            ->count();
        // Redirect to hospital list if updating hospital wasn't existed
        if ($therapist == null || $ther == 0) {
            return redirect()->intended('/therapist');
        }

        $positions = TherapistPosition::all();
        return view('therapist/edit', ['therapist' => $therapist, 'positions'=>$positions]);
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
        $therapist = Therapist::findOrFail($id);
        $this->validateInput($request);

        $keys = ['fullname', 'therapistposition_id', 'address', 'contactnumber', 'email'];
        $input = $this->createQueryInput($keys, $request);

        Therapist::where('id', $id)
            ->update($input);

        return redirect()->intended('/therapist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Therapist::where('id', $id)->delete();
        return redirect()->intended('/therapist');
   }

   private function validateInput($request) {
       $this->validate($request, [
           'fullname' => 'required|max:255',
           'therapistposition_id' => 'required',
           'email' => 'max:255',
           'contactnumber' => 'max:255',
           'address' => 'max:255',
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
