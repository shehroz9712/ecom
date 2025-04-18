<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Award;
use Illuminate\Auth\Access\HandlesAuthorization;

class AwardPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'awards';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, Award $award): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, Award $award): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, Award $award): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
