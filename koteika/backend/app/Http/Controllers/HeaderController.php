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
        Gate::authorize('index', Header::class);
        $headers = Header::all();
        return response()->json($headers, 200, [
            'Content-Type' => 'application/json; charset=utf-8',
        ], JSON_UNESCAPED_UNICODE);
    }

    public function edit(HeaderRequest $request): JsonResponse
    {
        Gate::authorize('edit', Header::class);
        $header = Header::firstOrFail();
        $dataToUpdate = $request->only(['title', 'text', 'city']);
        $header->update(array_filter($dataToUpdate));
        return response()->json($header, 200);
    }
}
