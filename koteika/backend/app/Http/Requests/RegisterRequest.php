<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|regex:/^[а-яА-ЯёЁ., -]+$/u',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|regex:/^\+7\(\d{3}\)\d{3}-\d{2}-\d{2}$/|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png|max:2048',
        ];
    }

    public function messages():array{
        return[
            'name.required' => 'Имя обязательно для заполнения',
            'phone.required' => 'Телефон обязателен для заполнения',
            'email.required' => 'Почта обязательна для заполнения',
            'password.required' => 'Пароль обязателен для заполнения',
            'name.regex' => 'Имя может содержать только русские букавы',
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
}
