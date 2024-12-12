<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'description',
        'check_in_date',
        'check_out_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}