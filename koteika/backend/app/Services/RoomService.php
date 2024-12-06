<?php
namespace App\Services;

use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;

class RoomService{
    public function applyFiltersAndSort(Builder $query, $request){
        $this->applyPriceFilter($query, $request);
        $this->applyDimensionsFilter($query, $request);
        $this->applyEquipmentFilter($query, $request);
        $this->applySorting($query, $request);

        return $query;
    }

    protected function applyPriceFilter(Builder $query, $request){
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
    }

    protected function applyDimensionsFilter(Builder $query, $request){
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
    }

    protected function applyEquipmentFilter(Builder $query, $request){
        if($request->has('equipments_names')){
            $equipmentNames = explode(',', $request->input('equipments_names'));

            $equipmentNames = array_map('trim', $equipmentNames);


            $query->where(function($q) use ($equipmentNames){
                foreach($equipmentNames as $equipmentName){
                    $q->whereHas('equipment', function($q) use ($equipmentName){
                        $q->where('name', '=', $equipmentName);
                    });
                }
            });
        }
    }

    protected function applySorting(Builder $query, $request){
        if($request->input('order_by') == 'desc'){
            $rooms = $query->orderBy('price', 'desc')->get();
            return response()->json($rooms);
        }else{
            $rooms = $query->orderBy('price', 'asc')->get();
            return response()->json($rooms);
        }  
    }
}