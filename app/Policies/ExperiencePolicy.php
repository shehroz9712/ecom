<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Experience;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExperiencePolicy
{
    use HandlesAuthorization;

    protected string $permission = 'experiences';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, Experience $experience): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, Experience $experience): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, Experience $experience): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
