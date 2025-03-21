<?php

namespace App\Models;
use App\Models\setting;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $primaryKey='BannerID';
    public $fillable =[
        'banners',
        'settingID',
        'slides',
        
    ];
    
    public $timestamps = false;
    public function settings(){
        return $this->belongsTo(setting::class,'settingID');
    }
}
