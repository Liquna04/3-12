<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'ProductID';
    protected $fillable = ['Name, Description, Price, Stock, IsVisible, SalesCount'];
    public $timestamps = false;
    public function categories(){
        return $this->belongsTo(categories::class);
    }
}
