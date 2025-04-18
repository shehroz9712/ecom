<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-settings');
    }

    public function view(User $user, Setting $setting): bool
    {
        return $user->hasPermissionTo('view-settings');
    }

    public function updateorStore(User $user, Setting $setting): bool
    {
        return $user->hasPermissionTo('edit-settings');
    }

    public function delete(User $user, Setting $setting): bool
    {
        return $user->hasPermissionTo('delete-settings');
    }
}
