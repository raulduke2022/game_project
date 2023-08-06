<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class CurrController extends Controller
{
    public function getCurr() {
        return json_encode(env('CURR', 'RUB'));
    }
}
