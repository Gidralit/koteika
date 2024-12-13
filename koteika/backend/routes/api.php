<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipmentController;

Route::get('/rooms/random', [RoomController::class, 'randomRooms']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/headers', [HeaderController::class, 'index']);

Route::get('/reviews/random', [ReviewController::class, 'randomCountReviews']);

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{room}', [RoomController::class, 'show']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->apiResource('/user', UserController::class);
Route::get('/filters_data', [RoomController::class, 'dataForFilters']);
//Доступно всем


Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/equipments', EquipmentController::class);
    Route::post('/rooms', [RoomController::class, 'store']);
    Route::patch('/rooms/{room}', [RoomController::class, 'update']);
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy']);
    Route::patch('/rooms/{room}/status', [RoomController::class, 'updateShowOnHomepage']);
    Route::patch('/contacts', [ContactController::class, 'update']);
    Route::patch('/headers/update', [HeaderController::class, 'update']);
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::get('/reservation', [ReservationController::class, 'index']);
    Route::post('/reservation/{room}', [ReservationController::class, 'reservationRoom']);
    Route::delete('/cancelReservation/{id}', [ReservationController::class, 'cancelReservation']);
    Route::delete('/deleteReservation/{id}', [ReservationController::class, 'adminDeleteReservation']);
    Route::post('/reservation/{id}/approve', [ReservationController::class, 'approveReservation']);
    Route::get('/reservation/userReservations', [ReservationController::class, 'userReservations']);
}); //Доступно авторизованным пользователям

Route::prefix('api-reservation')->middleware(['auth:sanctum'])->group(function () {
});



