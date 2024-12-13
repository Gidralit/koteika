<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'reservation_id' => 'required|exists:reservations,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }
    public function messages():array{
        return[
            'reservation_id.required' => 'Отзыв можно оставить только на существующую бронь',
            'title.required' => 'Укажите заголовок отзыва',
            'title.max' => 'Вы превысили 255 символов',
            'content.required' => 'Поле обязательно для заполнения',
        ];
    }
}
