<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class EditUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|regex:/^[а-яА-ЯёЁ., -]+$/u',
            'email' => 'email|unique:users',
            'phone' => 'string|regex:/^\+7\(\d{3}\)\d{3}-\d{2}-\d{2}$/|unique:users',
            'password' => 'string|min:8|confirmed',
            'avatar' => 'image|mimes:jpeg,png|max:2048',
        ];
    }

    public function messages():array{
        return[
            'name.regex' => 'Имя может содержать только русские буквы',
            'phone.regex' => 'Телефон не соответствует формату +7(xxx)xxx-xx-xx',
            'phone.unique' => 'Данный номер телефона уже занят, попробуйте другой',
            'email.email' => 'Почта не соответствует email формату',
            'email.unique' => 'Данная почта уже занята',
            'password.min' => 'Пароль должен содержать минимум 8 символов',
            'password.confirmed' => 'Введенные пароли не совпадают',
            'avatar.image' => 'Загруженный файл должен быть изображением',
            'avatar.mimes' => 'Изображение должно иметь разрешение jpeg или png',
            'avatar.max' => 'Максимальный размер файла 2 МБ',
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'errors'=> $validator->errors()
        ], 400));
    }
}
