<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'designation',
        'qualification',
        'photo',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
