<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $primaryKey = 'CategoryID';
    public function products(){
        return $this->hasMany(Products::class);
    }
}
