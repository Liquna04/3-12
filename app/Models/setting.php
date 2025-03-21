<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\banner;

class setting extends Model
{
    protected $primaryKey = 'settingID';
    protected $fillable = [
    
        'banner',
        
    ];

    public function banner(){
        return $this->hasMany(banner::class);
    }
    
}
