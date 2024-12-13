<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Resources\RoomResource;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Services\RoomService;

class RoomController extends Controller
{
    protected RoomService $roomService;

    public function __construct(RoomService $roomService){
        $this->roomService = $roomService;
    }

    public function index(Request $request)
    {
        $query = Room::with('equipment');

        $rooms = $this->roomService->applyFiltersAndSort($query, $request)->get();

        return response()->json($rooms);
    }

    public function dataForFilters(){
        $rooms = Room::all();
        $min_price = $rooms->min('price');
        $max_price = $rooms->max('price');

        $sizes = $rooms->map(function($room){
            return $room->square;
        });

        return response()->json(['min_price' => $min_price, 'max_price' => $max_price, 'sizes' => $sizes]);
    }

    public function store(RoomRequest $request)
    {
        $this->roomService->authorizeAdmin();
        $validatedData = $request->validated();
        $room = $this->roomService->createRoom($validatedData);

        return response()->json(new RoomResource($room), 201);
    }

    public function show($room)
    {
        $room = Room::with('equipment')->findOrFail($room);
        return new RoomResource($room);
    }

    public function update(RoomRequest $request, Room $room)
    {
        $this->roomService->authorizeAdmin();
        $validatedData = $request->validated();
        $room = $this->roomService->updateRoom($room, $validatedData);

        return response()->json(new RoomResource($room), 200);
    }

    public function destroy(Room $room)
    {
        $this->roomService->authorizeAdmin();
        $this->roomService->deleteRoom($room);
        return response()->json(['message' => 'Комната успешно удалена'], 201);
    }


    public function updateShowOnHomepage(Request $request, $id)
    {
        $this->roomService->authorizeAdmin();
        $room = Room::findOrFail($id);
        $validatedData = $request->validate([
            'show_on_homepage' => 'required|boolean',
        ]);
        $room->show_on_homepage = $validatedData['show_on_homepage'];
        $room->save();

        return response()->json($room);
    }
}
