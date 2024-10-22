<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ride;


class ride extends Model
{
    protected $fillable = ['passenger_id','driver_id','vehicle_id','pickup_location','dropoff_location','pickup_time','dropoff_time','status'];
    public function passenger(){
        return $this->belongsTo(passenger::class);
    }
    public function driver(){
        return $this->belongsTo(driver::class);
    }
    public function payment(){
        return $this->hasOne(payment::class);
    }
}
