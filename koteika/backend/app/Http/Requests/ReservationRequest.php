<?php

namespace App\Http\Requests;



use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
class ReservationRequest extends FormRequest
{
    public function authorize()
    {

        return true;
    }

    public function rules()
    {
        return [
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'room_id' => 'required|exists:rooms,id',
        ];
    }

    public function messages()
    {
        return [
            'check_in.required' => 'Дата заезда обязательна.',
            'check_in.date' => 'Дата заезда должна быть действительной датой.',
            'check_in.after_or_equal' => 'Дата заезда должна быть сегодня или позже.',
            'check_out.required' => 'Дата выезда обязательна.',
            'check_out.date' => 'Дата выезда должна быть действительной датой.',
            'check_out.after' => 'Дата выезда должна быть позже даты заезда.',
            'guests.required' => 'Количество гостей обязательно.',
            'guests.integer' => 'Количество гостей должно быть целым числом.',
            'guests.min' => 'Минимальное количество гостей - 1.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422)); // Статус ошибки при неудачной валидации
    }

}
