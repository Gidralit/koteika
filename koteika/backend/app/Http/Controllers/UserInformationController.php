<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserInformationController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();

        return response()->json($user);
    }
}
