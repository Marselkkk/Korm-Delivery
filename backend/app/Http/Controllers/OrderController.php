<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductWeight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'city'           => 'required|string|max:255',
            'street'         => 'required|string|max:255',
            'house'          => 'required|string|max:255',
            'phone'          => 'required|string|max:50',
            'items'          => 'required|array|min:1',
            'items.*.productId' => 'required|integer|exists:products,id',
            'items.*.weightId'  => 'required|integer|exists:product_weights,id',
            'items.*.quantity'  => 'required|integer|min:1',
        ]);

        $order = DB::transaction(function () use ($data) {
            $order = Order::create([
                'city'        => $data['city'],
                'street'      => $data['street'],
                'house'       => $data['house'],
                'phone'       => $data['phone'],
                'total_price' => 0,
            ]);

            $total = 0;

            foreach ($data['items'] as $item) {
                $weight = ProductWeight::with('product')->findOrFail($item['weightId']);

                $lineTotal = $weight->price * $item['quantity'];
                $total += $lineTotal;

                $order->items()->create([
                    'product_id'   => $item['productId'],
                    'weight_id'    => $weight->id,
                    'product_name' => $weight->product->name,
                    'weight_label' => $weight->weight,
                    'price'        => $weight->price,
                    'quantity'     => $item['quantity'],
                ]);
            }

            $order->update(['total_price' => $total]);

            return $order;
        });

        return response()->json(['order_id' => $order->id], 201);
    }
}
