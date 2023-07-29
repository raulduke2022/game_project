<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Middleware\ValidateGameInput;
use App\Services\Image\Service;

class BaseController extends Controller {
    public $service;

    public function __construct(Service $service)
    {
        $this->middleware(ValidateGameInput::class)->only('store', 'update');

        $this->service = $service;
    }

}
