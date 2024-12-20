<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index()
    {
        return Auth::user();
    }

    public function update(EditUserRequest $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $updatedUser = $this->userService->updateUser($user, $request->validated());
        return response()->json([
            'message'=>'user updated successfully',
            'user' => $updatedUser,
        ], 200);
    }

}
