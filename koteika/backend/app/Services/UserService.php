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
            $data['avatar'] = 'storage/avatars/'.$filename;
        }
        $data['password'] = Hash::make($data['password']);
        return User::Create($data);
    }

    public function updateUser(User $user, array $data){
        if(isset($data['name'])){
            $user->name = $data['name'];
        }
        if(isset($data['email'])){
            $user->email = $data['email'];
        }
        if(isset($data['phone'])){
            $user->phone = $data['phone'];
        }
        if(isset($data['avatar'])){
            $filename = Str::random(10).'.'.$data['avatar']->extension();
            $data['avatar']->storeAs('avatars', $filename,'public');
            $data['avatar'] = 'storage/app/public/avatars/'.$filename;
        }
        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }

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
