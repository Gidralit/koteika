<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['address',
    'works_with',
    'works_until',
    'telephone',
    'email',
    'link_to_vk',
    'link_to_whatsapp',
    'link_to_telegram'];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
