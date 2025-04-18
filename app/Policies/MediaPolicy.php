<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Media;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-media');
    }

    public function view(User $user, Media $media): bool
    {
        return $user->hasPermissionTo('view-media');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-media');
    }

    public function update(User $user, Media $media): bool
    {
        return $user->hasPermissionTo('edit-media');
    }

    public function delete(User $user, Media $media): bool
    {
        return $user->hasPermissionTo('delete-media');
    }
}
