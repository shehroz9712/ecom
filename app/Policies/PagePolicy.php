<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-pages');
    }

    public function view(User $user, Page $page): bool
    {
        return $user->hasPermissionTo('view-pages');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-pages');
    }

    public function update(User $user, Page $page): bool
    {
        return $user->hasPermissionTo('edit-pages');
    }

    public function delete(User $user, Page $page): bool
    {
        return $user->hasPermissionTo('delete-pages');
    }
}
