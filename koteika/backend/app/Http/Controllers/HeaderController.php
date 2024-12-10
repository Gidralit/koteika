<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeaderRequest;
use App\Models\Header;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class HeaderController extends Controller
{
    public function index(): JsonResponse
    {
        $headers = Header::all();
        return response()->json($headers, 200);
    }

    public function update(HeaderRequest $request): JsonResponse
    {
        Gate::authorize('update', Header::class);
        $header = Header::firstOrFail();
        $dataToUpdate = $request->only(['title', 'text', 'city']);
        $header->update(array_filter($dataToUpdate));
        return response()->json($header, 200);
    }
}
