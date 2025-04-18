<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserService;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserServicePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-UserServices');
    }

    public function view(User $user, UserService $UserService): bool
    {
        return $user->hasPermissionTo('view-UserServices');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-UserServices');
    }

    public function update(User $user, UserService $UserService): bool
    {
        return $user->hasPermissionTo('edit-UserServices');
    }

    public function delete(User $user, UserService $UserService): bool
    {
        return $user->hasPermissionTo('delete-UserServices');
    }
}
