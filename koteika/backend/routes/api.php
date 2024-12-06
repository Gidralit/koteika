<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController2;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomepageRoomsController;
use App\Http\Controllers\EquipmentController;

Route::get('/headers', [HeaderController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index']);

Route::apiResource('/rooms', RoomController2::class);
Route::get('/equipments', [EquipmentController::class, 'index']);
Route::get('/equipments_dependencies', [EquipmentController::class, 'equipmentsDependencies']);

Route::get('/reviews/random', [ReviewController::class, 'randomCountReviews']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/rooms/{id}', [HomepageRoomsController::class, 'editStatusRoom']);
Route::middleware('auth:api')->apiResource('/user', UserController::class);

Route::get('/tests', function () {
    return response()->json(['message' => 'api is working']);
});