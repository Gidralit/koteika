<?php
namespace App\Services;

use App\Models\Equipment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EquipmentService
{
    public function authorizeAdmin()
    {
        Gate::authorize('admin', Equipment::class);
    }

    public function createEquipment($data)
    {
        if (isset($data['icon'])) {
            $data['icon'] = $data['icon']->store('equipment/icons');
        }

        return Equipment::create($data);
    }

    public function updateEquipment(Equipment $equipment, $data)
    {
        if (isset($data['icon'])) {
            if ($equipment->icon) {
                Storage::delete($equipment->icon);
            }
            $data['icon'] = $data['icon']->store('equipment/icons');
        }

        $equipment->update($data);
        return $equipment;
    }

    public function deleteEquipment(Equipment $equipment)
    {
        if ($equipment->icon) {
            Storage::delete($equipment->icon);
        }
        $equipment->delete();
    }
}
