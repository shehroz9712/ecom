<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Certification;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificationPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'certifications';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, Certification $certification): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, Certification $certification): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, Certification $certification): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
