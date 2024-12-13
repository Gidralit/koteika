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
            'square' => 'sometimes|required|integer',
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
            'name.required' => 'Название номера обязательно для заполнения',
            'name.regex' => 'Используйте кириллицу',
            'square.required' => 'Поле обязательно для заполнения',
            'square.integer' => 'Используйте число',
            'price.required' => 'Поле обязательно для заполнения',
            'price.integer' => 'Используйте целое число',
            'equipment.array' => 'Должен содержать массив',
            'show_on_homepage.boolean' => 'Используйте true или false',
            'photo_path1.max' => '1 фотография превышает 2 мб',
            'photo_path2.max' => '2 фотография превышает 2 мб',
            'photo_path3.max' => '3 фотография превышает 2 мб',
            'photo_path4.max' => '4 фотография превышает 2 мб',
            'photo_path5.max' => '5 фотография превышает 2 мб',
            'photo_path1.mimes' => '1 фотография имеет неверный формат, используйте jpeg или png',
            'photo_path2.mimes' => '2 фотография имеет неверный формат, используйте jpeg или png',
            'photo_path3.mimes' => '3 фотография имеет неверный формат, используйте jpeg или png',
            'photo_path4.mimes' => '4 фотография имеет неверный формат, используйте jpeg или png',
            'photo_path5.mimes' => '5 фотография имеет неверный формат, используйте jpeg или png',

        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 401)); //статус ошибки при неудачной валидации
    }

}
