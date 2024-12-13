<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipmentController;

Route::prefix('booking')->middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/equipments', EquipmentController::class);
    Route::apiResource('/rooms', RoomController::class);
    Route::patch('/contacts', [ContactController::class, 'update']);
    Route::patch('/headers/update', [HeaderController::class, 'update']);
    Route::patch('/rooms/{room}/status', [RoomController::class, 'updateShowOnHomepage']);
    Route::get('/reservation', [RoomController::class, 'view']);
    Route::post('/reservation/{room}', [RoomController::class, 'reservationRoom']);
    Route::delete('/reservation/{product_id}', [RoomController::class, 'cancelReservation']);
}); //Доступно авторизованным пользователям

Route::prefix('booking')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index']);
    Route::get('/headers', [HeaderController::class, 'index']);
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/rooms/{room}', [RoomController::class, 'show']);
    Route::get('/reviews/random', [ReviewController::class, 'randomCountReviews']);
    Route::post('/review/create', [ReviewController::class, 'create']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:api')->apiResource('/user', UserController::class);
    Route::get('/filters_data', [RoomController::class, 'dataForFilters']);
});//Доступно всем

Route::prefix('api-reservation')->middleware(['auth:sanctum'])->group(function () {
});



