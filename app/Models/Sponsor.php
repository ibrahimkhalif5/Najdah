<?php

namespace App\Models;

use App\Media\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'sponsor',
        'amount',
        'website_url',
        'logo',
        'is_active',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'sponsor_id');
    }
}
