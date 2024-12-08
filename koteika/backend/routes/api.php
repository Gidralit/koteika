<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomepageRoomsController;
use App\Http\Controllers\EquipmentController;

Route::prefix('api-booking')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/contacts', [ContactController::class, 'index']);
    Route::patch('/contacts/edit', [ContactController::class, 'edit']);
    Route::get('/header', [HeaderController::class, 'index']);
    Route::patch('/header/edit', [HeaderController::class, 'edit']);
    Route::get('/equipments', [EquipmentController::class, 'index']);
    Route::post('/equipments', [EquipmentController::class, 'create']);
    Route::patch('/equipments/{equipment}/edit', [EquipmentController::class, 'edit']);
    Route::delete('/equipments/{equipment}/delete', [EquipmentController::class, 'destroy']);

});
Route::apiResource('/rooms', RoomController::class);
//Route::get('/equipments_dependencies', [EquipmentController::class, 'equipmentsDependencies']);

Route::get('/reviews/random', [ReviewController::class, 'randomCountReviews']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/rooms/{id}', [HomepageRoomsController::class, 'editStatusRoom']);
Route::middleware('auth:api')->apiResource('/user', UserController::class);

