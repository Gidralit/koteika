<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Models\Equipment;
use App\Services\EquipmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class EquipmentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Equipment::all());
    }

    protected $equipmentService;

    public function __construct(EquipmentService $equipmentService)
    {
        $this->equipmentService = $equipmentService;
    }

    public function store(EquipmentRequest $request): JsonResponse
    {
        $this->equipmentService->authorizeAdmin();
        $equipment = $this->equipmentService->createEquipment($request->validated());
        return response()->json($equipment, 201);
    }

    public function update(EquipmentRequest $request, Equipment $equipment): JsonResponse
    {
        $this->equipmentService->authorizeAdmin();
        $updatedEquipment = $this->equipmentService->updateEquipment($equipment, $request->validated());

        return response()->json(['message' => 'Оборудование успешно обновлено.', 'data' => $updatedEquipment], 200);
    }

    public function destroy(Equipment $equipment): JsonResponse
    {
        $this->equipmentService->authorizeAdmin();
        $this->equipmentService->deleteEquipment($equipment);

        return response()->json(['message' => 'Оборудование успешно удалено.'], 202);
    }

}
