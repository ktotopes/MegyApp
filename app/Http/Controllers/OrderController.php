<?php

namespace App\Http\Controllers;

use App\Enum\OrderDelivery;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $user = auth()->user();

        $location[] = explode(',', $request->input('location'));

        $delivery = OrderDelivery::from($request->input('delivery'));

        $order = Order::create([
            ...$request->validated(),
            'user_id' => $user->id,
            'price' => 2999,
            'discountPrice' => 2999 * 0.6,
            'address' => $request->input('address'),
            'delivery' => $delivery->delivery(),
            'location' => new Point($location[0][0], $location[0][1]),
        ]);

        return response()->json([
            'message' => 'Order created successfully..',
            'order' => $order,
        ]);
    }
}
