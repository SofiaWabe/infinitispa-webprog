<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = DB::table('room')
        ->select('room.*')
        ->paginate(20);

        return view('room/index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return view('room/create', ['rooms' => $rooms]);
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
        $keys = ['room', 'capacity', 'noofrooms'];
        $input = $this->createQueryInput($keys, $request);
        Room::create($input);

        return redirect()->intended('/room');
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
        $room = Room::find($id);
        $r = DB::table('room')
            ->count();
        // Redirect to hospital list if updating hospital wasn't existed
        if ($room == null || $r == 0) {
            return redirect()->intended('/room');
        }

        return view('room/edit', ['room' => $room]);
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
        $room = Room::findOrFail($id);
        $this->validateInput($request);

        $keys = ['room', 'capacity', 'noofrooms'];
        $input = $this->createQueryInput($keys, $request);

        Room::where('id', $id)
            ->update($input);

        return redirect()->intended('/room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::where('id', $id)->delete();
         return redirect()->intended('/room');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'room' => 'required|max:255',
            'capacity' => 'required|numeric',
            'noofrooms' => 'required|numeric'
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
