<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonialPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-testimonials');
    }

    public function view(User $user, Testimonial $testimonial): bool
    {
        return $user->hasPermissionTo('view-testimonials');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-testimonials');
    }

    public function update(User $user, Testimonial $testimonial): bool
    {
        return $user->hasPermissionTo('edit-testimonials');
    }

    public function delete(User $user, Testimonial $testimonial): bool
    {
        return $user->hasPermissionTo('delete-testimonials');
    }
}
