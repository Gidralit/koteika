<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Models\Equipment;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    public function index(): JsonResponse
    {
        Gate::authorize('index', Equipment::class);
        return response()->json(Equipment::all());
    }

    public function create(EquipmentRequest $request)
    {
        Gate::authorize('create', Equipment::class);
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('equipment/icons');
            $request->merge(['icon' => $iconPath]);
        }

        $equipment = Equipment::create($request->validated());
        return response()->json($equipment, 201);
    }
    public function edit(EquipmentRequest $request, Equipment $equipment)
    {
        Gate::authorize('edit', Equipment::class);
        if ($request->hasFile('icon')) {

            if ($equipment->icon) {
                Storage::delete($equipment->icon);
            }
            $iconPath = $request->file('icon')->store('equipment/icons');
            $request->merge(['icon' => $iconPath]);
        }

        $equipment->update($request->validated());
        return response()->json($equipment);
    }
    public function destroy(Equipment $equipment)
    {
        Gate::authorize('destroy', Equipment::class);
        if ($equipment->icon) {
            Storage::delete($equipment->icon);
        }
        $equipment->delete();
        return response()->json(null, 204);
    }

}
