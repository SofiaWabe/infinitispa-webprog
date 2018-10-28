<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = DB::table('discount')
        ->select('discount.*')
        ->paginate(20);

        return view('discount/index', ['discounts' => $discounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discounts = Discount::all();
        return view('discount/create', ['discounts' => $discounts]);
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
        $keys = ['discountname', 'discountrate'];
        $input = $this->createQueryInput($keys, $request);
        Discount::create($input);

        return redirect()->intended('/discount');
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
        $discount = Discount::find($id);
        $disc = DB::table('Discount')
            ->count();
        // Redirect to hospital list if updating hospital wasn't existed
        if ($discount == null || $disc == 0) {
            return redirect()->intended('/discount');
        }
        return view('discount/edit', ['discount' => $discount]);
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
        $discount = Discount::findOrFail($id);
        $this->validateInput($request);

        $keys = ['discountname', 'discountrate'];
        $input = $this->createQueryInput($keys, $request);

        Discount::where('id', $id)
            ->update($input);

        return redirect()->intended('/discount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discount::where('id', $id)->delete();
         return redirect()->intended('/discount');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'discountname' => 'required|max:255',
            'discountrate' => 'required|numeric'
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
