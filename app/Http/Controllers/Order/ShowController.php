<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(Order $order)
    {
        return view('admin/order/show', compact('order'));
    }
}
