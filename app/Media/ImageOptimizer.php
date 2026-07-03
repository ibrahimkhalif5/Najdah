<?php

namespace App\Media;

class ImageOptimizer
{
    private int $maxWidth = 1920;
    private int $maxHeight = 1080;
    private int $jpegQuality = 85;
    private int $pngCompression = 6;

    public function optimize(string $filePath): ?string
    {
        if (!file_exists($filePath)) {
            return null;
        }

        $mime = mime_content_type($filePath);
        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        $image = match (true) {
            $mime === 'image/jpeg' || $extension === 'jpg' || $extension === 'jpeg' => @imagecreatefromjpeg($filePath),
            $mime === 'image/png' || $extension === 'png' => @imagecreatefrompng($filePath),
            $mime === 'image/webp' || $extension === 'webp' => @imagecreatefromwebp($filePath),
            $mime === 'image/gif' || $extension === 'gif' => @imagecreatefromgif($filePath),
            default => null,
        };

        if (!$image) {
            return null;
        }

        $origWidth = imagesx($image);
        $origHeight = imagesy($image);

        // Strip EXIF orientation for JPEG
        if ($mime === 'image/jpeg') {
            $this->fixOrientation($filePath, $image);
        }

        // Resize if too large
        if ($origWidth > $this->maxWidth || $origHeight > $this->maxHeight) {
            $ratio = min($this->maxWidth / $origWidth, $this->maxHeight / $origHeight);
            $newWidth = (int)round($origWidth * $ratio);
            $newHeight = (int)round($origHeight * $ratio);

            $resized = imagecreatetruecolor($newWidth, $newHeight);

            if ($mime === 'image/png') {
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
            }

            imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
            imagedestroy($image);
            $image = $resized;
        }

        // Convert to JPEG if PNG/GIF without transparency
        $hasTransparency = false;
        if ($mime === 'image/png') {
            $hasTransparency = $this->hasPngTransparency($filePath);
        }
        if ($mime === 'image/gif') {
            $hasTransparency = true; // Keep GIF as-is for animations
        }

        // Save optimized version (convert PNG without transparency to JPEG)
        $isPngWithoutAlpha = $mime === 'image/png' && !$hasTransparency;

        if ($isPngWithoutAlpha) {
            $newPath = preg_replace('/\.png$/i', '.jpg', $filePath);
            imagejpeg($image, $newPath, $this->jpegQuality);
            if ($newPath !== $filePath) {
                unlink($filePath);
            }
        } elseif ($mime === 'image/jpeg' || $mime === 'image/jpg') {
            imagejpeg($image, $filePath, $this->jpegQuality);
            $newPath = $filePath;
        } elseif ($mime === 'image/png') {
            imagepng($image, $filePath, $this->pngCompression);
            $newPath = $filePath;
        } elseif ($mime === 'image/webp') {
            imagewebp($image, $filePath, $this->jpegQuality);
            $newPath = $filePath;
        } elseif ($mime === 'image/gif') {
            imagegif($image, $filePath);
            $newPath = $filePath;
        } else {
            $newPath = $filePath;
        }

        imagedestroy($image);

        return $newPath !== $filePath ? $newPath : $filePath;
    }

    private function fixOrientation(string $filePath, &$image): void
    {
        if (!function_exists('exif_read_data')) {
            return;
        }

        $exif = @exif_read_data($filePath);
        $orientation = $exif['IFD0']['Orientation'] ?? 1;

        if ($orientation === 3) {
            $image = imagerotate($image, 180, 0);
        } elseif ($orientation === 6) {
            $image = imagerotate($image, -90, 0);
        } elseif ($orientation === 8) {
            $image = imagerotate($image, 90, 0);
        }
    }

    private function hasPngTransparency(string $filePath): bool
    {
        $info = getimagesize($filePath);
        if (!isset($info['channels'])) {
            return false;
        }
        return $info['channels'] === 4 || ($info['bits'] ?? 8) >= 8;
    }
}
