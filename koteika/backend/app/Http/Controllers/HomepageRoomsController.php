<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class HomepageRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function editStatusRoom(Request $request, $id): JsonResponse
    {
        if(!auth()->check()){
            return response()->json(['message'=>'unauthenticated'], 401);
        }

        $room = Room::find($id);
        if(!$room){
            return response()->json(['message'=>'room not found'], 404);
        }
        
        if(Gate::denies('update', $room)){
            return response()->json(["message" => "forbidden"], 403);
        }

        if($request->has('status')){
            $room->status = $request->status;
        }

        $room->save();

        return response()->json($room, 200, ['Content-Type'=>'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
