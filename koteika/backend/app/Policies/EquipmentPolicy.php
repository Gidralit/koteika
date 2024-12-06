<?php

namespace App\Policies;

use App\Models\User;

class EquipmentPolicy
{
    public function edit(User $user)
    {
        return $user->role === 'admin';
    }

    public function index(User $user)
    {
        return $user->role === 'admin';
    }
    public function destroy(User $user)
    {
        return $user->role === 'admin';
    }
    public function create(User $user)
    {
        return $user->role === 'admin';
    }
}
