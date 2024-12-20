<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserService{
    public function createUser(array $data){
        if(isset($data['avatar'])){
            $filename = Str::random(10).'.'.$data['avatar']->extension();
            $data['avatar']->storeAs('avatars', $filename,'public');
            $data['avatar'] = 'avatars/'.$filename;
        }
        $data['password'] = Hash::make($data['password']);
        return User::Create($data);
    }

    public function updateUser(User $user, array $data)
    {
        if (isset($data['avatar'])) {
            $filename = Str::random(10) . '.' . $data['avatar']->extension();
            $data['avatar']->storeAs('avatars', $filename, 'public');
            $data['avatar'] = 'storage/avatars/' . $filename;
        }
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user->fill(array_filter($data));
        $user->save();

        return $user;
    }

    public function loginUser(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('kotiki')->plainTextToken;

            return [
                'token' => $token,
                'user' => $user,
            ];
        }
        return null;
    }
}
