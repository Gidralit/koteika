<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'reservation_id' => $this->reservation_id,
            'title' => $this->title,
            'content' => $this->content,
            'rating' => $this->rating,
            'user' => [
                'name' => $this->user->name,
            ],
        ];
    }
}
