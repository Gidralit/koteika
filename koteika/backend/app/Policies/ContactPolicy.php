<?php

namespace App\Policies;
use App\Models\User;

class ContactPolicy
{
    public function update(User $user)
    {
        return $user->role === 'admin';
    }
}
