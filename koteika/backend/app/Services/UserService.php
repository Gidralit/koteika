<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserService{
    public function createUser(array $data){
        if($data['avatar']){
            $filename = Str::random(10).'.'.$data['avatar']->extension();
            $data['avatar']->storeAs('avatars', $filename,'public');
            $data['avatar'] = 'storage/avatars/'.$filename;
        }
        $data['password'] = Hash::make($data['password']);
        return User::Create($data);
    }
}