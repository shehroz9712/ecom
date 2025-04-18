<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SuccessStory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuccessStoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-successStories');
    }

    public function view(User $user, SuccessStory $successStory): bool
    {
        return $user->hasPermissionTo('view-successStories');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-successStories');
    }

    public function update(User $user, SuccessStory $successStory): bool
    {
        return $user->hasPermissionTo('edit-successStories');
    }

    public function delete(User $user, SuccessStory $successStory): bool
    {
        return $user->hasPermissionTo('delete-successStories');
    }
}
