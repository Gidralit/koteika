<?php

namespace App\Http\Controllers;


use App\Http\Requests\RoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Equipment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    protected RoomService $roomService;

    public function __construct(RoomService $roomService){
        $this->roomService = $roomService;
    }

    public function index(Request $request) //Получение номеров с фильтрацией
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

        $equipments = Equipment::all();

        $equipmentsNames = $equipments->map(function($equipment){
            return $equipment->name;
        });

        return response()->json(['min_price' => $min_price, 'max_price' => $max_price, 'sizes' => $sizes, 'equipments' => $equipmentsNames]);
    }

    public function store(RoomRequest $request) // Создание номера
    {
        $this->roomService->authorizeAdmin();
        $validatedData = $request->validated();
        $room = $this->roomService->createRoom($validatedData);

        return response()->json(new RoomResource($room), 201);
    }

    public function show($room) // Поиск одной комнаты
    {
        $room = Room::with('equipment')->findOrFail($room);
        return new RoomResource($room);
    }

    public function update(RoomRequest $request, Room $room) //Обновление комнаиты
    {
        $this->roomService->authorizeAdmin();
        $validatedData = $request->validated();
        $room = $this->roomService->updateRoom($room, $validatedData);

        return response()->json(new RoomResource($room), 200);
    }

    public function destroy(Room $room) //
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


    public function reservationRoom(ReservationRequest $request, Room $room)
    {
        if (!$room) {
            return response()->json(['message' => 'Комната не найдена'], 404);
        }
        Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'price' => $room->price,
            'description' => $room->description,
            'check_in_date' => $request->check_in,
            'check_out_date' => $request->check_out,
            ],
        );
        return response()->json(['message' => 'Комната успешно забронирована'], 201);
    }
    public function cancelReservation($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        if (!$reservation) {
            return response()->json(['message' => 'Бронирование не найдено'], 404);
        }
        if ($reservation->user_id !== Auth::id()) {
            return response()->json(['message' => 'У вас нет прав на отмену этого бронирования'], 403);
        }
        $reservation->delete();
        return response()->json(['message' => 'Бронирование успешно отменено'], 200);
    }
}
