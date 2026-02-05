<?php

namespace App\Models;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [
        
       
        'sponsor',
        'amount',
        
    ];
   
    // public function sponsors(){
    //     return $this->belongsTo(Project::class,'sponsor_id')->withDefault();
    // }
}