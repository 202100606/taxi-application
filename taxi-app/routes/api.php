<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\passengercontroller;
use App\Http\Controllers\API\drivercontroller;
use App\Http\Controllers\API\vehiclecontroller;
use App\Http\Controllers\API\ridecontroller;
use App\Http\Controllers\API\paymentcontroller;








Route::get('/passengers',[passengercontroller::class,'index']);
Route::get('/passengers/{id}',[passengercontroller::class,'show']);
Route::post('/passengers',[passengercontroller::class,'store']);
Route::put('/passengers',[passengercontroller::class,'update']);
Route::delete('/passengers',[passengercontroller::class,'destroy']);

Route::post('/drivers',[drivercontroller::class,'store']);
Route::get('/drivers',[drivercontroller::class,'index']);
Route::get('/drivers/{id}',[drivercontroller::class,'show']);
Route::put('/drivers',[drivercontroller::class,'update']);
Route::delete('/drivers',[drivercontroller::class,'destroy']);

Route::post('/vehicles',[vehiclecontroller::class,'store']);
Route::get('/vehicles',[vehiclecontroller::class,'index']);
Route::get('/vehicles/{id}',[vehiclecontroller::class,'show']);
Route::put('/vehicles',[vehiclecontroller::class,'update']);
Route::delete('/vehicles',[vehiclecontroller::class,'destroy']);

Route::post('/rides',[ridecontroller::class,'store']);
Route::get('/rides',[ridecontroller::class,'index']);
Route::get('/rides/{id}',[ridecontroller::class,'show']);
Route::put('/rides',[ridecontroller::class,'update']);
Route::delete('/rides',[ridecontroller::class,'destroy']);

Route::post('/payments',[paymentcontroller::class,'store']);
Route::get('/payments',[paymentcontroller::class,'index']);
Route::get('/payments/{id}',[paymentcontroller::class,'show']);
Route::put('/payments',[paymentcontroller::class,'update']);
Route::delete('/payments',[paymentcontroller::class,'destroy']);






















