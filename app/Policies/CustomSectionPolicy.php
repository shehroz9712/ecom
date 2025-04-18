<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CustomSection;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomSectionPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'customSections';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, CustomSection $customSection): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, CustomSection $customSection): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, CustomSection $customSection): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
