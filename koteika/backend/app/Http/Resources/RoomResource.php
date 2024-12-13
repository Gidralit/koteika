<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'square' => $this->square,
            'price' => $this->price,
            'show_on_homepage' => $this->show_on_homepage,
            'equipment' => EquipmentResource::collection($this->whenLoaded('equipment')),
            'photos' => $this->getPhotoPaths(),
        ];
    }
    protected function getPhotoPaths()
    {
        return [
            'photo_path1' => $this->photo_path1 ? asset('storage/' . $this->photo_path1) : null,
            'photo_path2' => $this->photo_path2 ? asset('storage/' . $this->photo_path2) : null,
            'photo_path3' => $this->photo_path3 ? asset('storage/' . $this->photo_path3) : null,
            'photo_path4' => $this->photo_path4 ? asset('storage/' . $this->photo_path4) : null,
            'photo_path5' => $this->photo_path5 ? asset('storage/' . $this->photo_path5) : null,
        ];
    }
}
