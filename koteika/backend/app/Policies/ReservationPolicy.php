<?php

namespace App\Policies;

use App\Models\User;

class ReservationPolicy
{
    public function admin(User $user)
    {
        return $user->role === 'admin';
    }
}
