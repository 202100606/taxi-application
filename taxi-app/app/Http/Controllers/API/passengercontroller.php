<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\passenger;
use App\Http\Requests\passengerrequest;


class passengercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $passenger = passenger::paginate(2);
       return response()->json($passenger);
    }

    /**
     
     */
    public function store(passengerrequest $request)
    {
        $passenger = passenger::create($request->all());
        return response()->json([
            "status"=>true,
            "message"=>"passenger created successfully",
            "data"=>$passenger

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(passengerrequest $request,$id)
    {
        $passenger = passenger::find($id);
        


         return response()->json([
            "status" => true,
            "message" => "The displayed passenger",
            "data" => $passenger,
        ]);

    }
        
    

    /**
     * Show the form for editing the specified resource.
     
    
     */
    public function update(passengerrequest $request)
    {
        $id = $request->input('id');
        $passenger = passenger::find($id);
        $passenger->name = $request->get('name');
        $passenger->email = $request->get('email');
        $passenger->phone = $request->get('phone');
        $passenger->save();
        return response()->json([
            "status"=>true,
            "message"=>"passenger updated successfully",
            "data"=>$passenger
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(passengerrequest $request)
    {
        $id = $request->input('id');
        $passenger = passenger::find($id);
        $passenger->delete();
        return response()->json([
            "status"=>true,
            "message"=>"passenger deleted successfully"
        ]);
    }
}
