<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DigitalSignature;
use Illuminate\Auth\Access\HandlesAuthorization;

class DigitalSignaturePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-DigitalSignature');
    }

    public function view(User $user, DigitalSignature $digitalSignature): bool
    {
        return $user->hasPermissionTo('view-DigitalSignature');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-DigitalSignature');
    }

    public function update(User $user, DigitalSignature $digitalSignature): bool
    {
        return $user->hasPermissionTo('edit-DigitalSignature');
    }

    public function delete(User $user, DigitalSignature $digitalSignature): bool
    {
        return $user->hasPermissionTo('delete-DigitalSignature');
    }
}
