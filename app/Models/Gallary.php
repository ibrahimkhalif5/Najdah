<?php

namespace App\Models;

use App\Media\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallary extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'title',
        'description',
    ];

    protected function getMediaDirectory(): string
    {
        return 'galleries';
    }
}
