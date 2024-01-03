<?php

namespace App\Http\Controllers;

use App\Models\CompletedOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('Order.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return redirect()->route('orders.update', $order->id);

    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status_en' => 'required',
        ]);

        $order->status_en = "completed";

        if ($order->status_en == "completed") {
            // Move to CompletedOrders table
            $completedOrder = new CompletedOrder();
            $completedOrder->name = $order->name;
            $completedOrder->telephone = $order->telephone;
            $completedOrder->address = $order->address;
            $completedOrder->total_price = $order->total_price;
            $completedOrder->products = json_encode($order->products); // Convert array to JSON
            $completedOrder->status = "completed";
            // Set other attributes as needed
            $completedOrder->save();

            // Delete from Orders table
            $order->delete();
        }


        return redirect()->route('orders.index')->with('warning', __('words.ProductUpdatedSuccessfully'));
    }

    public function show(Order $order)
    {
        return view('Order.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('danger', __('words.ProductDeletedSuccessfully'));

    }

}
