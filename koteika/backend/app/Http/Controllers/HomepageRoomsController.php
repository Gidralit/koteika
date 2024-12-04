<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id): JsonResponse
    {
        $room = Room::find($id);
        if(!$room){
            return response()->json(['message'=>'room not found'], 404);
        }
        
        $this->authorize('update', $room);

        if($request->has('status')){
            $room->status = $request->status;
        }

        $room->save();

        return response()->json($room, 200, ['Content-Type'=>'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
