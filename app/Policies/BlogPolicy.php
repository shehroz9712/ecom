<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-blogs');
    }

    public function view(User $user, Blog $blog): bool
    {
        return $user->hasPermissionTo('view-blogs');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-blogs');
    }

    public function update(User $user, Blog $blog): bool
    {
        return $user->hasPermissionTo('edit-blogs');
    }

    public function delete(User $user, Blog $blog): bool
    {
        return $user->hasPermissionTo('delete-blogs');
    }
}
