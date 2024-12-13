<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pets_names' => [
                'nullable',
                'array',
            ],
            'pets_names.*' => [
                'string',
            ],
            function ($attribute, $value, $fail) {

                $namesArray = array_filter(array_map('trim', explode(',', $value)));
                $petsCount = (int)$this->pets_count;

                if (count($namesArray) !== $petsCount) {
                    $fail("Количество имен питомцев должно соответствовать количеству питомцев ({$petsCount}).");
                }
            },


            'check_in_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today', function ($attribute, $value, $fail) {
                if ($this->check_out_date && $this->isOverlapping($value, $this->check_out_date)) {
                    $fail('Выбранный промежуток пересекается с уже существующими бронями.');
                }
            }],
            'check_out_date' => ['required', 'date_format:Y-m-d', 'after:check_in_date', function ($attribute, $value, $fail) {
                if ($this->check_in_date && $this->isOverlapping($this->check_in_date, $value)) {
                    $fail('Выбранный промежуток пересекается с уже существующими бронями.');
                }
            }],
            'pets_count' => 'required|integer|min:1|max:4',
            'room_id' => 'required|exists:rooms,id',
        ];
    }

    public function messages()
    {
        return [
            'pets_names.required' => 'Имя питомца обязательно.',
            'pets_names.string' => 'Имя питомца должно быть строкой.',
            'check_in_date.required' => 'Дата заезда обязательна.',
            'check_in_date.date' => 'Дата заезда должна быть действительной датой.',
            'check_in_date.after_or_equal' => 'Дата заезда должна быть сегодня или позже.',
            'check_out_date.required' => 'Дата выезда обязательна.',
            'check_out_date.date' => 'Дата выезда должна быть действительной датой.',
            'check_out_date.after' => 'Дата выезда должна быть позже даты заезда.',
            'pets_count.required' => 'Количество питомцев обязательно.',
            'pets_count.integer' => 'Количество питомцев должно быть целым числом.',
            'pets_count.min' => 'Минимальное количество питомцев - 1.',
            'pets_count.max' => 'Максимальное количество питомцев - 4.',
            'room_id.required' => 'ID номера обязателен.',
            'room_id.exists' => 'Выбранный номер не существует.',
        ];
    }

    protected function isOverlapping($checkIn, $checkOut)
    {
        $checkInDate = Carbon::createFromFormat('Y-m-d', $checkIn);
        $checkOutDate = Carbon::createFromFormat('Y-m-d', $checkOut);

        // Получаем все существующие брони для данного номера
        $existingReservation = DB::table('reservations')
            ->where('room_id', $this->room_id)
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('check_in_date', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('check_out_date', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where('check_in_date', '<=', $checkInDate)
                            ->where('check_out_date', '>=', $checkOutDate);
                    });
            })
            ->exists();

        return $existingReservation;
    }
}
