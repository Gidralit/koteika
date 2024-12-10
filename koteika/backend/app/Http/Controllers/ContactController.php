<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    public function index(): JsonResponse
    {
        return response() -> json(Contact::all());
    }

    public function update(ContactRequest $request): JsonResponse
    {
        Gate::authorize('update', Contact::class);
        $contact = Contact::firstOrFail();
        $dataToUpdate = $request->only(['address', 'works_with', 'works_until', 'telephone', 'email', 'link_to_vk', 'link_to_whatsapp', 'link_to_telegram']);
        $contact->update(array_filter($dataToUpdate));

        return response()->json($contact, 200);
    }
}
