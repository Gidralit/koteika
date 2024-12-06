<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Services\RoomService;

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

    public function update(Request $request, string $id) // Изменить статус номера админом(использовать политику)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
