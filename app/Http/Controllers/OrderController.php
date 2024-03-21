<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $user = auth()->user();

        $order = Order::create([
            ...$request->validated(),
            'user_id' => $user->id,
            'price' => 2999,
            'discountPrice' => 2999*0.6,
        ]);

        return response()->json([
            'message' => 'Order created successfully..',
            'order' => $order
        ]);
    }
}
