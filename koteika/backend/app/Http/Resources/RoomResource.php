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
            'width' => $this->width,
            'height' => $this->height,
            'length' => $this->length,
            'price' => $this->price,
            'show_on_homepage' => $this->show_on_homepage,
            'equipment' => EquipmentResource::collection($this->whenLoaded('equipment')),
        ];
    }
}
