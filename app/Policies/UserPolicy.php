<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-users');
    }

    public function view(User $user): bool
    {
        return $user->hasPermissionTo('view-users');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-users');
    }

    public function update(User $user): bool
    {
        return $user->hasPermissionTo('edit-users');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('delete-users');
    }
}
