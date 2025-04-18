<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Summary;
use Illuminate\Auth\Access\HandlesAuthorization;

class SummaryPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'summaries';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, Summary $summary): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, Summary $summary): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, Summary $summary): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
