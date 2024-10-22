<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\driver;

class drivercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driver = driver::paginate(2);
        return response()->json($driver);
    }

    /**
     
     */
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $driver = driver::create($request->all());
        return response()->json([
            "status"=>true,
            "message"=>"driver created successfully",
            "data"=>$driver
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $driver = driver::find($id);
        return response()->json([
            'status'=>true,
            'message'=>'The displayed driver',
            'data'=>$driver
        ]);
    }

    /**
    
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $driver = driver::find($id);
        $driver->name = $request->get('name');
        $driver->email = $request->get('email');
        $driver->phone = $request->get('phone');
        $driver->save();
        return response()->json([
            'status'=>true,
            'message'=>'driver updated successfully',
            'data'=>$driver
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $driver = driver::find($id);
        $driver->delete();
        return response()->json([
            'status'=>true,
            'message'=>'driver deleted successfully'
        ]);

    }
}
