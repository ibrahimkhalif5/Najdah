<?php

namespace App\Models;

use App\Models\Gallary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallary extends Model
{
    use HasFactory;
     protected $fillable = [
        
        'title',
        'description',
        'images'
        
       
       
        
    ];
    protected $casts = [
    'images' => 'array',
];

}
