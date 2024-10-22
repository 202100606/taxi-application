<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ride;

class ridecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ride = ride::with(['passenger','driver'])->paginate(2);
        return response()->json($ride);
    }
       
    

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ride = ride::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'ride created successfully',
            'data'=>$ride
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ride = ride::with(['passenger','driver'])->find($id);
        return response()->json([
            'status'=>true,
            'message'=>'the displayed ride',
            'data'=>$ride
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
        $ride = ride::find($id);
        $ride->passenger_id = $request->get('passenger_id');
        $ride->driver_id = $request->get('driver_id');
        $ride->pickup_location = $request->get('pickup_location');
        $ride->dropoff_location = $request->get('dropoff_location');
        $ride->pickup_time = $request->get('pickup_time');
        $ride->dropoff_time = $request->get('dropoff_time');
        $ride->status = $request->get('status'); // 'pending', 'completed', etc.
        $ride->save();
        return response()->json([
            'status'=>true,
            'message'=>'ride updated successfully',
            'data'=>$ride
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $ride = ride::find($id);
        $ride->delete();
        return response()->json([
            'status'=>true,
            'message'=>'ride deleted successfully',
        ]);
    }
}
