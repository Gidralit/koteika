<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController2;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\HomepageRoomsController;

Route::get('/headers', [HeaderController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::apiResource('/rooms', RoomController2::class);
Route::get('/reviews/random', [ReviewController::class, 'randomCountReviews']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/rooms/{id}', [HomepageRoomsController::class, 'editStatusRoom']);
Route::middleware('auth:api')->get('/user', [UserInformationController::class, 'index']);

Route::get('/tests', function () {
    return response()->json(['message' => 'api is working']);
});