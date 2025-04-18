<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PageSection;
use Illuminate\Auth\Access\HandlesAuthorization;

class PageSectionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-pageSections');
    }

    public function view(User $user, PageSection $pageSection): bool
    {
        return $user->hasPermissionTo('view-pageSections');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-pageSections');
    }

    public function update(User $user, PageSection $pageSection): bool
    {
        return $user->hasPermissionTo('edit-pageSections');
    }

    public function delete(User $user, PageSection $pageSection): bool
    {
        return $user->hasPermissionTo('delete-pageSections');
    }
}
