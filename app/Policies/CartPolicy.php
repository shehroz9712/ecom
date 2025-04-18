<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-carts');
    }

    public function view(User $user, Cart $cart): bool
    {
        return $user->hasPermissionTo('view-carts');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-carts');
    }

    public function update(User $user, Cart $cart): bool
    {
        return $user->hasPermissionTo('edit-carts');
    }

    public function delete(User $user, Cart $cart): bool
    {
        return $user->hasPermissionTo('delete-carts');
    }
}
