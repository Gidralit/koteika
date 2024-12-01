<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'width', 'height', 'length', 'equipment', 'photo_path'];
}
