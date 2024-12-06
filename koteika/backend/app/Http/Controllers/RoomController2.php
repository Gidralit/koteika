<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Services\RoomService;

class RoomController2 extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //создание номера админом(использовать политику)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)// Показать один номер
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // Изменить статус номера админом(использовать политику)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
