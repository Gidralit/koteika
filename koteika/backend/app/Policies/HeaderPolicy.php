<?php

namespace App\Policies;
use App\Models\User;

class HeaderPolicy
{
    public function update(User $user)
    {
        return $user->role === 'admin';
    }
}
