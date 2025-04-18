<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserSkill;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSkillPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'User';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, UserSkill $userSkill): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, UserSkill $userSkill): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, UserSkill $userSkill): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
