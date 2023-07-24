<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateGameData
{
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',
            'price' => 'required|numeric',
            'key' => 'string|required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return new JsonResponse(['errors' => $validator->errors()], 422);
        }

        return $next($request);
    }
}
