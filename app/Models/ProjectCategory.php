<?php

namespace App\Models;

use App\Models\ProjectCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        
       
        'category',
        'description',
        'images'
        
    ];
   
    public function projects(){
        
        return $this->hasMany(Project::class,'id');
    }
}