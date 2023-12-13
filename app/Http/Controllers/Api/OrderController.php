<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/orders",
     *     tags={"Orders"},
     *     summary="Get list of orders",
     *     @OA\Response(response="200", description="List of orders")
     * )
     */
    public function index()
    {
        try {
            $orders = Order::all();
            return response()->json(['orders' => $orders], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/orders",
     *     tags={"Orders"},
     *     summary="Create a new order",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *             // Add other properties as needed
     *         )
     *     ),
     *     @OA\Response(response="201", description="Order created successfully"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => "required",
                'telephone' => "required",
                'products' => "required|array",
                'total_price' => "required",
                // Add validation rules for other properties
            ]);

            $order = Order::create($request->all());

            return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating order', 'message' => $e->getMessage()], 500);
        }
    }


    /**
     * @OA\Get(
     *     path="/api/orders/{id}",
     *     tags={"Orders"},
     *     summary="Get a specific order",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Order details"),
     *     @OA\Response(response="404", description="Order not found"),
     * )
     */
    public function show(Order $order)
    {
        try {
            return response()->json(['order' => $order], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/orders/{id}",
     *     tags={"Orders"},
     *     summary="Update a specific order",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Order updated successfully"),
     *     @OA\Response(response="404", description="Order not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(Request $request, Order $order)
    {
        try {
            $request->validate([
                'status' => 'required',
            ]);

            $order->update($request->all());

            if ($order->status == "completed") {
                $order->delete();
            }

            return response()->json(['message' => 'Order updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating order'], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/orders/{id}",
     *     tags={"Orders"},
     *     summary="Delete a specific order",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Order ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Order deleted successfully"),
     *     @OA\Response(response="404", description="Order not found"),
     * )
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting order'], 500);
        }
    }
}
