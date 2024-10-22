<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vehicle;

class vehiclecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicle = vehicle::with('driver')->paginate(2);
        return response()->json($vehicle);
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehicle = vehicle::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'vehicle created successfully',
            'data'=>$vehicle
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = vehicle::with('driver')->find($id);
        return response()->json([
            'status'=>true,
            'message'=>'the displayed vehicle',
            'data'=>$vehicle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $vehicle = vehicle::find($id);
        $vehicle->vehicle_number = $request->get('vehicle_number');
        $vehicle->driver_id = $request->get('driver_id');
        $vehicle->save();
        return response()->json([
            'status'=>true,
            'message'=>'driver updated successfully',
            'data'=>$vehicle
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $vehicle = vehicle::find($id);
        $vehicle->delete();
        return response()->json([
            'status'=>true,
            'message'=>'vehicle deleted successfully'

        ]);
    }
}
