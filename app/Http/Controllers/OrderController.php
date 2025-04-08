<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // \Log::info('Form submitted with:', $request->all());

        $validated = $request->validate([
            'card_name' => 'required|string',
            'card_number' => 'required|string',
            'expiry_date' => 'required|string',
            'cvv' => 'required|string',
            'billing_address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'country' => 'required|string',
            'order_items' => 'required',
        ]);

        $order = Order::create($validated);

        // \Log::info('Order saved successfully with ID: ' . $order->id);

        return back()->with('success', 'Order placed successfully!');
    }

    public function myOrders()
    {
        $orders = \App\Models\Order::orderBy('created_at', 'desc')->get();
        return view('my_orders', compact('orders'));
    }
}
