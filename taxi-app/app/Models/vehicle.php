<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vehicle;


class vehicle extends Model
{
    protected $fillable = ['vehicle_number','driver_id'];
    public function driver(){
        return $this->belongsTo(driver::class);
    }
}
