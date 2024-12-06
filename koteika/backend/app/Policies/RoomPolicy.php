<?php

namespace App\Policies;

use App\Models\User;

class RoomPolicy
{
    public function create(User $user)
    {
        return $user->role === 'admin';
    }
    public function edit(User $user)
    {
        return $user->role === 'admin';
    }
    public function destroy(User $user)
    {
        return $user->role === 'admin';
    }
}
