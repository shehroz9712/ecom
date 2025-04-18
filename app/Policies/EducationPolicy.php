<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Education;
use Illuminate\Auth\Access\HandlesAuthorization;


class EducationPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'educations';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, Education $education): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, Education $education): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, Education $education): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
