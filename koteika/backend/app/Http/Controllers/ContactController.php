<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function index(): JsonResponse{
        $contacts = Contact::all();
        return response() -> json($contacts, 
        200, 
        ['Content-Type' => 'application/json; charset=utf-8'], 
        JSON_UNESCAPED_UNICODE);
    }
}
