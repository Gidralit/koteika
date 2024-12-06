<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/^[А-Яа-яЁёs]+$/u',
            'dimensions' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png|max:2048',
            'status' => 'nullable',
            'price' => 'required|integer',
            'equipment' => 'nullable|array',
            'equipment.*' => 'exists:equipment,id'
        ];
    }
}
