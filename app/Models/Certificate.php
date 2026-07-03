<?php

namespace App\Models;

use App\Media\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'title',
        'description',
        'issued_date',
    ];

    protected $casts = [
        'issued_date' => 'date',
    ];
}
