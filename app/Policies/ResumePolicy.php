<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Resume;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResumePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-resumes');
    }

    public function view(User $user, Resume $resume): bool
    {
        return $user->hasPermissionTo('view-resumes');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-resumes');
    }

    public function update(User $user, Resume $resume): bool
    {
        return $user->hasPermissionTo('edit-resumes');
    }

    public function delete(User $user, Resume $resume): bool
    {
        return $user->hasPermissionTo('delete-resumes');
    }
}
