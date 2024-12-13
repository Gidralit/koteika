<?php
namespace App\Services;

use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;


class RoomService
{

    public function authorizeAdmin()
    {
        Gate::authorize('admin', Room::class);
    }

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
            $arrayDimensions = explode(',', $dimensions);

            if (!empty($arrayDimensions)) {
                $query->where(function ($q) use ($arrayDimensions) {
                    foreach ($arrayDimensions as $dimension) {
                        $q->orWhere('square', '=', $dimension);
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
    
    public function createRoom(array $data)
    {   
        $room = Room::create($data);
        $photoKeys = ['photo_path1', 'photo_path2', 'photo_path3', 'photo_path4', 'photo_path5'];
        foreach($photoKeys as $key){
            if(isset($data[$key])){
                $filename = Str::random(10).'.'.$data[$key]->extension();
                $data[$key]->storeAs('photosRooms', $filename, 'public');
                $data[$key] = 'photosRooms/'.$filename;
            }   
        }

        if (isset($data['equipment'])) {
            $room->equipment()->attach($data['equipment']);
        }

        $room->update($data);

        return $room;
    }

    public function updateRoom(Room $room, $data)
    {
        $room->update(array_filter($data));

        if (array_key_exists('equipment', $data)) {
            $room->equipment()->sync($data['equipment']);
        }

        return $room;
    }

    public function deleteRoom(Room $room)
    {
        $room->delete();
    }

}
