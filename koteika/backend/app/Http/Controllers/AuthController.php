<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
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

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $result = $this->userService->loginUser($credentials);

        if ($result) {
            return response()->json($result, 201);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
