<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passenger extends Model
{
    protected $fillable = ['name',  'email','phone'];
    public function rides(){
        return $this->hasMany(ride::class);
    }
}
