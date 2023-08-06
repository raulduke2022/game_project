<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class StoreController extends Controller
{
    public function __invoke($id)
    {
        $newOrder = Order::create(
            [
                'game_id' => $id,
            ]
        );
        return $newOrder;
    }
}
