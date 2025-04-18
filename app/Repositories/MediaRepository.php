<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use App\Repositories\Interfaces\MediaRepositoryInterface;
use App\Traits\UploadMedia;
use Illuminate\Support\Facades\Storage;

class MediaRepository implements MediaRepositoryInterface
{
    use UploadMedia;
    public function getAll($params = [])
    {
        $query = Media::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Media::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return Media::find($id);
    }

    public function create(array $data)
    {
        return Media::create($data);
    }

    /**
     * Handle File Upload and Save Media Record
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param int|null $userId
     * @return Media|null
     */
    public function store($request): ?Media
    {

        $file = $request['name'];
        $url = NULL;
        $name = NULL;
        $folder = $request['folder'];
        $alt = $request['alt'] ?? 'Ai Pro Resume';

        if ($file instanceof UploadedFile) {
            $name = $this->uploadFile($file, $folder);
        } elseif (is_string($file) && filter_var($file, FILTER_VALIDATE_URL)) {
            $url = $file;
        } else {
            return null;
        }

        $media = Media::create([
            'name'   => $name,
            'url'   => $url,
            'folder' => $folder,
            'alt'    => $alt,
        ]);
        // $media =  Media::create([
        //     'name' => $filePath,
        //     'folder' => $request['folder'],
        //     'alt' => $request->alt ?? 'Ai Pro Resume', // Fix ternary operator
        // ]);
        return $media;
    }



    public function update($id, array $data)
    {
        $record = Media::find($id);
        if (!$record) {
            return null;
        }

        $file = $data['name'];
        $url = NULL;
        $name = NULL;
        $folder = $data['folder'];
        $alt = $request['alt'] ?? 'Ai Pro Resume';

        if ($file instanceof UploadedFile) {
            $name = $this->uploadFile($file, $folder);
        } elseif (is_string($file) && filter_var($file, FILTER_VALIDATE_URL)) {

            $url = $file;
        } else {
            return null;
        }

        $record->update([
            'name'   => $name,
            'url'   => $url,
            'folder' => $folder,
            'alt'    => $alt,
        ]);

        return $record;
    }


    public function delete($id)
    {
        $record = Media::find($id);
        if (!$record) {
            return false;
        }

        // Delete file from storage
        if ($record->folder && Storage::disk('public')->exists('uploads/' . $record->folder . '/' . $record->name)) {
            Storage::disk('public')->delete('uploads/' . $record->folder . '/' . $record->name);
        }

        return $record->delete();
    }
}
