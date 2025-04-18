<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Media;

use App\Helpers\MediaHelper;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll($params = [])
    {
       
        $query = User::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = User::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function create(array $data)
    {
        // Remove password_confirmation & image
        $data = collect($data)->except(['password_confirmation', 'image'])->toArray();

        // image upload
        if (request()->hasFile('image')) {
            $file = request()->file('image');

            $data['image_id'] = MediaHelper::uploadImageMedia($imageFile, 'uploads/users', auth()->id());
        }

        // $data['package_id'] = 1;

        // Create user
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        if (!$user) {
            return null;
        }

        // Remove password_confirmation
        $data = collect($data)->except(['password_confirmation', 'image'])->toArray();

        // Handle password update if provided
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // Handle image update
        if (request()->hasFile('image')) {
            $file = request()->file('image');

            $data['image_id'] = MediaHelper::uploadImageMedia($imageFile, 'uploads/users', auth()->id());
        }

        // Update user
        $user->update($data);

        return $user;
    }

    public function delete($id)
    {
        $record = User::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }

    public function getUserCreationCounts($startDate, $endDate)
    {
        return User::selectRaw('DATE(created_at) as date, COUNT(*) as total_users')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get()
            ->makeHidden(['roles', 'role_names']);
    }
}
