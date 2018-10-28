<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\ServiceCategory;

class ServiceCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = DB::table('service_category')
        ->select('service_category.*')
        ->paginate(20);

        return view('service-category/index', ['categorys' => $categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = ServiceCategory::all();
        return view('service-category/create', ['categorys' => $categorys]);
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
        $keys = ['servicecategoryname', 'description'];
        $input = $this->createQueryInput($keys, $request);
        ServiceCategory::create($input);

        return redirect()->intended('/service-category');
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
        $category = ServiceCategory::find($id);
        $servcat = DB::table('service_category')
            ->count();
        // Redirect to hospital list if updating hospital wasn't existed
        if ($category == null || $servcat == 0) {
            return redirect()->intended('/service-category');
        }
        return view('service-category/edit', ['category' => $category]);
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
        $category = ServiceCategory::findOrFail($id);
        $this->validateInput($request);

        $keys = ['servicecategoryname', 'description'];
        $input = $this->createQueryInput($keys, $request);

        ServiceCategory::where('id', $id)
            ->update($input);

        return redirect()->intended('/service-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceCategory::where('id', $id)->delete();
         return redirect()->intended('/service-category');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'servicecategoryname' => 'required|max:60',
            'description' => 'max:255'
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
