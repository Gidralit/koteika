<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = ['title', 'text', 'city'];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
