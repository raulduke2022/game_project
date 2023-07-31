<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class EditController extends Controller
{
    public function __invoke(Order $order) {
        $order->update([
            'is_done' => !$order->isDone()
        ]);
        session()->flash('success', 'Статус заказа с номером ' . $order->id . ' изменен');
        session()->flash('id', $order->id);
        return redirect()->back();
    }
}
