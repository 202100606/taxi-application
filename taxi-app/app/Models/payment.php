<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\payment;


class payment extends Model
{
    protected $fillable = ['ride_id','amount','payment_method','status'];
    public function ride(){
        return $this->belongsTo(ride::class);
    }
}
