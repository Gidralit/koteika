<?php

namespace App\Policies;

use App\Models\User;

class EquipmentPolicy
{
    public function admin(User $user)
    {
        return $user->role === 'admin';
    }
}
