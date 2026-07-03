<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'filename',
        'original_filename',
        'mime_type',
        'size',
        'width',
        'height',
        'sort_order',
    ];

    protected $casts = [
        'size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'sort_order' => 'integer',
    ];

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getUrlAttribute(): string
    {
        return Storage::url($this->path);
    }

    public function getThumbnailAttribute(): string
    {
        $dir = dirname($this->path);
        $ext = pathinfo($this->filename, PATHINFO_EXTENSION);
        $base = pathinfo($this->filename, PATHINFO_FILENAME);
        $thumbPath = "{$dir}/{$base}_thumb.{$ext}";

        if (Storage::exists($thumbPath)) {
            return Storage::url($thumbPath);
        }

        return $this->url;
    }

    protected static function booted(): void
    {
        static::deleted(function (Media $media) {
            $dir = dirname($media->path);
            $ext = pathinfo($media->filename, PATHINFO_EXTENSION);
            $base = pathinfo($media->filename, PATHINFO_FILENAME);
            $thumbPath = "{$dir}/{$base}_thumb.{$ext}";

            Storage::delete([$media->path, $thumbPath]);
        });
    }
}
