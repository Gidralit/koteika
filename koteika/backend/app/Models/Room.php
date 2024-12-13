<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'square',
        'price',
        'show_on_homepage',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function equipment(){
        return $this->belongsToMany(Equipment::class, 'equipment_room');
    }
}
