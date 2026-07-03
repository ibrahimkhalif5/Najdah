<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'email',
        'subject',
        'message',
        'read_at',
        'is_archived',
        'is_spam',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'read_at' => 'datetime',
        'is_archived' => 'boolean',
        'is_spam' => 'boolean',
    ];

    public function scopeArchived($query)
    {
        return $query->where('is_archived', true);
    }

    public function scopeNotArchived($query)
    {
        return $query->where('is_archived', false);
    }

    public function scopeSpam($query)
    {
        return $query->where('is_spam', true);
    }

    public function scopeNotSpam($query)
    {
        return $query->where('is_spam', false);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function markAsRead(): void
    {
        if (is_null($this->read_at)) {
            $this->update(['read_at' => now()]);
        }
    }

    public function markAsUnread(): void
    {
        $this->update(['read_at' => null]);
    }

    public function markAsSpam(): void
    {
        $this->update(['is_spam' => true]);
    }

    public function markAsNotSpam(): void
    {
        $this->update(['is_spam' => false]);
    }

    public function toggleArchive(): void
    {
        $this->update(['is_archived' => !$this->is_archived]);
    }
}
