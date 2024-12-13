<?php

namespace App\Policies;

use App\Models\User;

class ReservationPolicy
{
    public function update(User $user)
    {
        return $user->role === 'admin';
    }
}
