<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RoomController extends Controller
{
    public function index(): JsonResponse{
        $rooms = Room::all();
        return response() -> json($rooms, 
        200, 
        ['Content-Type' => 'application/json; charset=utf-8'], 
        JSON_UNESCAPED_UNICODE);
    }
}
