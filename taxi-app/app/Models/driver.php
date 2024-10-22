<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\driver;


class driver extends Model
{
    protected $fillable = ['name',  'email','phone'];
    public function vehicle(){
        return $this->hasOne(vehicle::class);
    }
    public function rides(){
        return $this->hasMany(ride::class);
    }
}
