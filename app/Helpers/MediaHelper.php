<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaHelper
{
    /**
     * Handle Image Upload and Save Media Record
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param int|null $userId
     * @return int|null Returns media ID or null on failure
     */
    public static function uploadImageMedia(UploadedFile $file, string $folder = 'uploads/users', ?int $userId = null): ?int
    {
        if (!$file->isValid()) {
            return null;
        }

        $fileName = 'AI Pro Resume' . time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs($folder, $fileName, 'public');

        // Save media record
        $media = Media::create([
            'name' => $fileName,
            'alt' => 'Ai Pro Resume',
            'path' => $filePath,
            'user_id' => $userId ?? Auth::id() ?? 1,
            'updated_by' => $userId ?? Auth::id() ?? 1,
        ]);

        return $media->id ?? null;
    }

    /**
     * Upload a file and return the path
     *
     * @param UploadedFile $file
     * @param string $path
     * @return string|null
     */
    public static function fileUpload($file, $path = 'uploads/admin_user_services')
    {
        // Ensure the directory exists (using Storage)
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        // Generate a unique filename
        $filename = 'Ai Pro Resume' . '-' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the file and return the path
        $filePath = $file->storeAs($path, $filename, 'public'); // Use 'public' disk for public access

        // Return the uploaded file path
        return $filePath;
    }
}
