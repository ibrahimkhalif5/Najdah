<?php

namespace App\Models;

use App\Media\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'status',
        'user_id',
        'category_id',
        'location',
        'amount',
        'sponsor_id',
        'title',
        'description',
        'project_cost',
        'start_date',
        'completed_date',
    ];

    protected $casts = [
        'project_cost' => 'decimal:2',
        'start_date' => 'date',
        'completed_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class, 'sponsor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
