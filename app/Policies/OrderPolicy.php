<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    protected string $permission = 'orders';

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function view(User $user, Order $order): bool
    {
        return $user->hasPermissionTo("view-{$this->permission}");
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-{$this->permission}");
    }

    public function update(User $user, Order $order): bool
    {
        return $user->hasPermissionTo("edit-{$this->permission}");
    }

    public function delete(User $user, Order $order): bool
    {
        return $user->hasPermissionTo("delete-{$this->permission}");
    }
}
