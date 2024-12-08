<?php

namespace App\Policies;
use App\Models\User;

class ContactPolicy
{
    public function edit(User $user)
    {
        return $user->role === 'admin';
    }
    public function index(User $user)
    {
        return $user->role === 'admin';
    }
}
