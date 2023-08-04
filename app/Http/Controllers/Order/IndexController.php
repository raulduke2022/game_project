<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $isDone = $request->query('is_done');
        $records = Order::query();

        if ($isDone === 'true') {
            $records->where('status', 'success');
        } elseif ($isDone === 'false') {
            $records->whereNotIn('status', ['success']);
        }
        $orders = $records->with('game')->orderBy('created_at', 'desc')->paginate(10); //eager loading
        $orders->appends(['is_done' => $isDone]);
        return view('admin/order/index', compact('orders'));
    }
}

