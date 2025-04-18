<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CoverLetter;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoverLetterPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-coverLetters');
    }

    public function view(User $user, CoverLetter $coverLetter): bool
    {
        return $user->hasPermissionTo('view-coverLetters');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-coverLetters');
    }

    public function update(User $user, CoverLetter $coverLetter): bool
    {
        return $user->hasPermissionTo('edit-coverLetters');
    }

    public function delete(User $user, CoverLetter $coverLetter): bool
    {
        return $user->hasPermissionTo('delete-coverLetters');
    }
}
