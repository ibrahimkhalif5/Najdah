<?php

namespace App\Media;

use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HasMedia
{
    public static function bootHasMedia(): void
    {
        static::deleting(function ($model) {
            if (method_exists($model, 'isForceDeleting') && !$model->isForceDeleting()) {
                return;
            }
            $model->media->each->delete();
        });
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable')->orderBy('sort_order');
    }

    public function addMedia(UploadedFile $file, ?string $directory = null, int $sortOrder = 0): Media
    {
        $directory ??= $this->getMediaDirectory();

        $originalFilename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = Str::uuid() . '.' . $extension;
        $path = $file->storeAs($directory, $filename, 'public');

        $optimizer = new ImageOptimizer();
        $optimizedPath = $optimizer->optimize(Storage::path($path));

        $dimensions = getimagesize($optimizedPath);

        return $this->media()->create([
            'path' => $optimizedPath ?: $path,
            'filename' => $filename,
            'original_filename' => $originalFilename,
            'mime_type' => $file->getMimeType(),
            'size' => filesize($optimizedPath ?: Storage::path($path)),
            'width' => $dimensions[0] ?? null,
            'height' => $dimensions[1] ?? null,
            'sort_order' => $sortOrder,
        ]);
    }

    public function addMultipleMedia(array $files, ?string $directory = null): \Illuminate\Support\Collection
    {
        $maxSort = $this->media()->max('sort_order') ?? 0;
        $records = collect();

        foreach ($files as $i => $file) {
            if ($file instanceof UploadedFile) {
                $records->push($this->addMedia($file, $directory, $maxSort + $i + 1));
            }
        }

        return $records;
    }

    public function firstMedia(): ?Media
    {
        return $this->media()->first();
    }

    public function mediaUrl(): ?string
    {
        return $this->firstMedia()?->url;
    }

    public function mediaThumbnail(): ?string
    {
        return $this->firstMedia()?->thumbnail;
    }

    public function mediaCount(): int
    {
        return $this->media()->count();
    }

    protected function getMediaDirectory(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
