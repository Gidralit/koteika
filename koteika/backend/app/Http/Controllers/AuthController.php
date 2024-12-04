<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthController extends Controller
{

    use AuthorizesRequests;

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|regex:/^[а-яА-ЯёЁa-zA-Z., -]+$/u',
            'phone' => 'required|regex:/^\+7\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png|max:2048', 
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        if($request->hasFile('avatar')){
            $filename = Str::random(10).'.'.$request->avatar->extension();
            $request->avatar->storeAs('avatars', $filename, 'public');
            $user->avatar = 'storage/avatars/'.$filename;
        }

        $user->save();
        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if(auth()->attempt($credentials)){
            $user = auth()->user();
            $token = $user->createToken('kotiki')->plainTextToken;

            return response()->json(
                [
                    'token' => $token, 
                    'user' => $user
                ], 
                    200, 
                    ['Content-Type' => 'application/json; charset=utf-8'], 
                    JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
