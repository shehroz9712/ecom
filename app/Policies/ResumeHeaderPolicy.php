<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ResumeHeader;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResumeHeaderPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'resumeHeaders';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, ResumeHeader $resumeHeader): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, ResumeHeader $resumeHeader): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, ResumeHeader $resumeHeader): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
