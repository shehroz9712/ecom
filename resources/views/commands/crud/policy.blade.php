<?php

namespace App\Policies;

use App\Models\User;
use App\Models\{{name}};
use Illuminate\Auth\Access\HandlesAuthorization;

class {{name}}Policy
{
    use HandlesAuthorization;

    protected string $permission = '{{kebabName}}';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, {{name}} ${{varName}}): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, {{name}} ${{varName}}): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, {{name}} ${{varName}}): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
