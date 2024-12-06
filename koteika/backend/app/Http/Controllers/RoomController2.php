<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) //Получение номеров с фильтрацией
    {
        $query = Room::query();

        // Сортировка по стоимости(ОТ цена ДО цена)
        if(!is_null($request->input('min_price')) || !is_null($request->input('max_price'))){
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');

            if(!is_null($minPrice)){
                $query->where('price', '>=', $minPrice);
            }

            if(!is_null($maxPrice)){
                $query->where('price', '<=', $maxPrice);
            }
        }

        //Фильтр на размер площадей
        if(!is_null($request->input('dimensions'))){
            $dimensions = $request->input('dimensions');
            $arrayNumbers = explode(',', $dimensions);
            $arrayDimensions = [];

            for($i = 0; $i<count($arrayNumbers); $i += 3){
                $arrayDimensions[] = trim($arrayNumbers[$i]).','.trim($arrayNumbers[$i+1]).','.trim($arrayNumbers[$i+2]);
            }

            if (!empty($arrayDimensions)) {
                // Используем orWhere, чтобы охватить любые подходящие размеры
                $query->where(function ($q) use ($arrayDimensions) {
                    foreach ($arrayDimensions as $dimension) {
                        $q->orWhere('dimensions', '=', $dimension);
                    }
                });
            }

        }

        if($request->input('order_by') == 'desc'){
            $rooms = $query->orderBy('price', 'desc')->get();
            return response()->json($rooms);
        }else{
            $rooms = $query->orderBy('price', 'asc')->get();
            return response()->json($rooms);
        }
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
