<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'CartID';
    protected $fillable = ['Quantity'];
    public $timestamps = false;
}

