<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
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

    public function update(Request $request, string $id) // Изменить статус номера админом(использовать политику)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
