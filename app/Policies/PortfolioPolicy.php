<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'portfolios';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, Portfolio $portfolio): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, Portfolio $portfolio): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, Portfolio $portfolio): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
