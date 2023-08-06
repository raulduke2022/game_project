<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'introduction' => '',
            'title' => 'required',
            'description' => 'string',
            'price' => 'numeric',
            'attachment.*' => 'required|file|max:10240|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'attachment.*.max' => 'Размер каждого вложения не должен превышать 10 МБ.',
            'attachment.*.mimes' => 'Формат вложений должен быть JPEG или PNG.',
            'required'    => 'Поле :attribute должно быть заполнено',
            'string'    => 'Поле :attribute должно быть типа строка',
            'numeric'    => 'Поле :attribute должно быть типа число',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'название',
            'price' => 'цена',
            'key' => 'ключ',
            'description' => 'описание',
        ];
    }
}
