<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'shop' => 'required|string',
            'key' => 'required|string',
            'curr' => 'required|string',
            'extra_key' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required'    => 'Поле :attribute должно быть заполнено',
            'string'    => 'Поле :attribute должно быть типа строка',
        ];
    }

    public function attributes()
    {
        return [
            'shop' => 'идентификатор мерчанта',
            'key' => 'секретный ключ',
            'curr' => 'валюта',
            'extra_key' => 'дополнительный ключ',
        ];
    }
}
