<?php

namespace App\Models;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
        'category_id',
        'location',
        'images',
        'amount',
        'sponsor_id',
        'title',
        'description'
        
    ];
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class,'category_id');
    }
    
    // public function category(){
    //     return $this->belongsTo(ProjectCategory::class,'category_id')->withDefault();
    // }
    // public function sponsor(){
    //     return $this->hasMany(Sponsor::class,'id')->withDefault();
    // }
    
}