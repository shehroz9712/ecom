<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadMedia
{
    public function uploadFile(UploadedFile $file, string $folder, $media = null): string
    {
        // Ensure media object has valid path (folder name)
        if($media)
        $storagePath = 'uploads/' . $media->folder . '/';  // Corrected path usage

        // Delete old file if exists
        if (!empty($media->name) && Storage::disk('public')->exists($storagePath . $media->name)) {
            Storage::disk('public')->delete($storagePath . $media->name);
        }

        // Generate new file name
        $fileName = 'Ai Pro Resume' . '-' . time() . '_' . $file->getClientOriginalName();

        $file->storeAs('uploads/' . $folder, $fileName, 'public');

        // Return path without "uploads/" prefix
        return $fileName;
    }
}