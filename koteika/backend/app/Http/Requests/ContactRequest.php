<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'address' => 'sometimes|required|string|max:255',
            'works_with' => 'sometimes|required|string|max:255',
            'works_until' => 'sometimes|required|string|max:255',
            'telephone' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email',
            'link_to_vk' => 'sometimes|required|string|max:255',
            'link_to_whatsapp' => 'sometimes|required|string|max:255',
            'link_to_telegram' => 'sometimes|required|string|max:255',

        ];
    }

    public function messages(): array
    {
        return [
            'address.required' => 'Заполните адрес при редактировании',
            'address.max' => 'Вы превысили 255 символов',
            'works_with.required' => 'Заполните начало время работы',
            'works_with.max' => 'Вы превысили 255 символов',
            'works_until.required' => 'Заполните конец времени работы',
            'works_until.max' => 'Вы превысили 255 символов',
            'telephone.required' => 'Заполните телефон при редактировании',
            'telephone.max' => 'Вы превысили 255 символов',
            'email.required' => 'Заполните почту при редактировании',
            'email.email' => 'Почта некорректная',
            'link_to_vk.required' => 'Заполните ссылку на вк при редактировании',
            'link_to_vk.max' => 'Вы превысили 255 символов',
            'link_to_whatsapp.required' => 'Заполните ссылку на вацап при редактировании',
            'link_to_whatsapp.max' => 'Вы превысили 255 символов',
            'link_to_telegram.required' => 'Заполните ссылку на тг при редактировании',
            'link_to_telegram.max' => 'Вы превысили 255 символов',
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 401)); //статус ошибки при неудачной валидации
    }
}
