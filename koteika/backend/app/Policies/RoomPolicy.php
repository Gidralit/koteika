<?php

namespace App\Policies;

use App\Models\User;

class RoomPolicy
{
    public function admin(User $user)
    {
        return $user->role === 'admin';
    }

}
