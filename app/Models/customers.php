<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'CustomerID';
    protected $fillable = ['full_name, email, phone, password_hash,gender, address,profile_picture'];
    public $timestamps = false;
}
