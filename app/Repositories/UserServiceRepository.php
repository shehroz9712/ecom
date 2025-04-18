<?php

namespace App\Repositories;

use App\Models\UserService;
use App\Models\User;
use App\Models\Service;
use App\Helpers\MediaHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Interfaces\UserServiceRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserServiceRepository implements UserServiceRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = UserService::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = UserService::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return UserService::select('status', 'service_price', 'expected_date', 'file')
        ->find($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return UserService::create($data);
    }

    public function update($id, array $data)
    {
        $record = UserService::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function updateUserService($id, $file)
    {
        $UserService = UserService::find($id);

        if (!$UserService) {
            return false; // Return false if service is not found
        }

       // Handle file upload
       $filePath = MediaHelper::fileUpload($file, 'admin_user_services');

        // Update only the "delievered" and "file" fields
        $UserService->update([
            'delievered' => 1, // Set to 1 as per requirement
            'file' => $filePath
        ]);

        return $UserService;
    }


    public function delete($id)
    {
        $record = UserService::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
