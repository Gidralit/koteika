<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Room;

class RoomPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Room $room)
    {
        return $user->role === 'admin';
    }
}
