<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payment;

class paymentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment = payment::with('ride')->paginate(2);
        return response()->json($payment);
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payment = payment::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'payment created successfully',
            'data'=>$payment
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = payment::find($id);
        return response()->json([
            'status'=>true,
            'message'=>'the displayed payment',
            'data'=>$payment
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
        $payment = payment::find($id);
        $payment->ride_id = $request->get('ride_id');
        $payment->amount = $request->get('amount');
        $payment->payment_method = $request->get('payment_method');
        $payment->status = $request->get('status');
        $payment->save();
        return response()->json([
            'status'=>true,
            'message'=>'payment updated successfully',
            'data'=>$payment

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $payment = payment::find($id);
        $payment->delete();
        return response()->json([
            'status'=>true,
            'message'=>'payment deleted successfully'
        ]);
    }
}
