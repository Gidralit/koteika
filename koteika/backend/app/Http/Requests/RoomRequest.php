<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class RoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|string|regex:/^[А-Яа-яЁёs]+$/u',
            'width' => 'sometimes|required|numeric',
            'height' => 'sometimes|required|numeric',
            'length' => 'sometimes|required|numeric',
            'price' => 'sometimes|required|integer',
            'equipment' => 'sometimes|array|nullable',
            'equipment.*' => 'exists:equipment,id',
            'photo_path1' => 'nullable|image|mimes:jpeg,png|max:2048',
            'photo_path2' => 'nullable|image|mimes:jpeg,png|max:2048',
            'photo_path3' => 'nullable|image|mimes:jpeg,png|max:2048',
            'photo_path4' => 'nullable|image|mimes:jpeg,png|max:2048',
            'photo_path5' => 'nullable|image|mimes:jpeg,png|max:2048',
            'show_on_homepage' => 'sometimes|boolean',
        ];
    }

    public function messages():array{
        return[
//            'name.required' => 'Название номера обязательно для заполнения',
//            'name.regex' => 'Используйте кириллицу',
//            'width.required' => 'Поле обязательно для заполнения',
//            'width.numeric' => 'Используйте число',
//            'height.required' => 'Поле обязательно для заполнения',
//            'height.numeric' => 'Используйте число',
//            'length.required' => 'Поле обязательно для заполнения',
//            'length.numeric' => 'Используйте число',
//            'price.required' => 'Поле обязательно для заполнения',
//            'price.integer' => 'Используйте целое число',
//            'equipment.array' => 'Должен содержать массив',
//            'show_on_homepage.boolean' => 'Используйте true или false',
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 401)); //статус ошибки при неудачной валидации
    }

}
