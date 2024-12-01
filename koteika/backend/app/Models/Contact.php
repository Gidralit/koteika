<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['address', 
    'works with', 
    'works until', 
    'telephone', 
    'email', 
    'link to vk', 
    'link to instagram', 
    'link to telegram'];
}
