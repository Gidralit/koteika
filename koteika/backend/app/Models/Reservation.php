<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'pets_count',
        'price',
        'check_in_date',
        'check_out_date',
        'status',
        'pets_names'
    ];

    public function approve()
    {
        $this->status = 'approved';
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    protected $casts = [
        'pets_names' => 'array',
    ];
    public function getPetsNamesAttribute($value)
    {
        return json_decode($value, true);
    }

}
