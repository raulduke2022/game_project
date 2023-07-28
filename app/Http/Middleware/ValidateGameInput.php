<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateGameInput
{
    public function handle(Request $request, Closure $next)
    {
        $messages = array(
            'required'    => 'Поле :attribute должно быть заполнено',
            'string'    => 'Поле :attribute должно быть типа строка',
            'numeric'    => 'Поле :attribute должно быть типа число',
        );

        $attributes = [
            'title' => 'название',
            'price' => 'цена',
            'key' => 'ключ',
            'description' => 'описание',
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'string|required',
            'price' => 'required|numeric',
            'key' => 'string|required',
            'description' => 'nullable',
        ], $messages);

        $validator->setAttributeNames($attributes);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $next($request);
    }
}
