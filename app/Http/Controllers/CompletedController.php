<?php

namespace App\Http\Controllers;

use App\Models\CompletedOrder;
use Illuminate\Http\Request;

class CompletedController extends Controller
{
    public function index()
    {
        $completedOrders = CompletedOrder::all();
        return view('completedOrders.index', compact('completedOrders'));
    }

    public function show(CompletedOrder $completedOrder)
    {
        return view('completedOrders.show', compact('completedOrder'));
    }

    public function destroy(CompletedOrder $completedOrder)
    {
        $completedOrder->delete();
        return redirect()->route('completedOrders.index')->with('danger', 'Order deleted successfully!');

    }
}
