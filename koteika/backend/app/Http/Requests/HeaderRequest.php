<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class HeaderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array // правила валидации
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'text' => 'sometimes|required|string|max:255',
            'city' => 'sometimes|required|string|max:24'
        ];
    }

    public function messages(): array // сообщения при неуспешной валидации
    {
        return [
            'title.required' => 'Заполните название при редактировании',
            'title.max' => 'Вы превысили 255 символов',
            'text.required' => 'Заполните слоган при редактировании',
            'text.max' => 'Вы превысили 255 символов',
            'city.required' => 'Заполните город при редактировании',
            'city.max' => 'Вы превысили 24 символа',
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 401)); //статус ошибки при неудачной валидации
    }
}
