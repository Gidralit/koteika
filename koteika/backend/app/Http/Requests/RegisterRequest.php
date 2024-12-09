<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
