<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Validators\ReservationRequest;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $roomService;

    public function __construct(RoomService $roomService){
        $this->roomService = $roomService;
    }

    public function index(Request $request) //Получение номеров с фильтрацией
    {
        $query = Room::with('equipment');

        $rooms = $this->roomService->applyFiltersAndSort($query, $request)->get();

        return response()->json($rooms);
    }

    public function store(Request $request) //создание номера админом(использовать политику)
    {


    }

    public function show(int $id)// Показать один номер
    {
        //
    }
    public function reservationRoom(ReservationRequest $request, Room $room, $roomId)
    {


        // Проверка доступности номера
        $room = Room::find($roomId);
        if (!$room) {
            return response()->json(['message' => 'Комната не найдена'], 404);
        }

        // Создание нового бронирования
        Reservation::create(
            [
                'user_id' => Auth::id(),
                'room_id' => $roomId,
                'price' => $room->price,
                'description' => $room->description,
            ],
        );
        return response()->json(['message' => 'Комната успешно забронирована'], 201);
    }

    public function update(Request $request, string $id) // Изменить статус номера админом(использовать политику)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
