<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class StoreController extends Controller
{
    public function __invoke($payeer, $id) {
        Order::create([
            'payeer' => $payeer,
            'is_done' => false,
            'game_id' => $id,
        ]);
    }
}
