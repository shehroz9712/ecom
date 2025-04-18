<?php

namespace App\Policies;

use App\Models\Package;
use App\Models\User;
use App\Models\PackageSubscribe;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackageSubscribePolicy
{
    use HandlesAuthorization;


    public function packageSubcribe(User $user): bool
    {
        return $user->hasPermissionTo('packageSubcribe');
    }

}
