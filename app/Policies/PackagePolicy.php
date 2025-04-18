<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Package;

class PackagePolicy
{
    /**
     * Determine whether the user can view any Package records.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-packages');
    }

    /**
     * Determine whether the user can view a specific Package record.
     */
    public function view(User $user, Package $package): bool
    {
        return $user->hasPermissionTo('view-packages');
    }

    /**
     * Determine whether the user can create an Package record.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-packages');
    }

    /**
     * Determine whether the user can update an Package record.
     */
    public function update(User $user, Package $package): bool
    {
        return $user->hasPermissionTo('edit-packages');
    }

    /**
     * Determine whether the user can delete an Package record.
     */
    public function delete(User $user, Package $package): bool
    {
        return $user->hasPermissionTo('delete-packages');
    }
}
