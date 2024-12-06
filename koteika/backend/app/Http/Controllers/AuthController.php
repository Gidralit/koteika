<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthController extends Controller
{

    use AuthorizesRequests;

    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request){

        $user = $this->userService->createUser($request->validated());

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
