<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompletedOrder;
use Illuminate\Http\Request;

class CompletedOrderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/CompletedOrders",
     *     tags={"CompletedOrders"},
     *     summary="Get list of CompletedOrders",
     *     @OA\Response(response="200", description="List of CompletedOrders")
     * )
     */
    public function index()
    {
        try {
            $CompletedOrders = CompletedOrder::all();
            return response()->json(['completedOrders' => $CompletedOrders], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/CompletedOrders",
     *     tags={"CompletedOrders"},
     *     summary="Create a new CompletedOrder",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="telephone", type="string"),
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="products", type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="name_uz", type="string"),
     *                     @OA\Property(property="name_ru", type="string"),
     *                     @OA\Property(property="name_en", type="string"),
     *                     @OA\Property(property="quantity", type="integer"),
     *                     @OA\Property(property="price", type="number"),
     *                 )
     *             ),
     *             @OA\Property(property="total_price", type="number"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="CompletedOrder created successfully"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => "required",
                'telephone' => "required",
                'address' => "required",
                'products' => "required|array",
                'total_price' => "required",
            ]);

            $CompletedOrder = CompletedOrder::create($request->all());

            return response()->json(['message' => 'CompletedOrder created successfully', 'CompletedOrder' => $CompletedOrder], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating CompletedOrder', 'message' => $e->getMessage()], 500);
        }
    }


    /**
     * @OA\Get(
     *     path="/api/CompletedOrders/{id}",
     *     tags={"CompletedOrders"},
     *     summary="Get a specific CompletedOrder",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="CompletedOrder ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="CompletedOrder details"),
     *     @OA\Response(response="404", description="CompletedOrder not found"),
     * )
     */
    public function show(CompletedOrder $CompletedOrder)
    {
        try {
            return response()->json(['CompletedOrder' => $CompletedOrder], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/CompletedOrders/{id}",
     *     tags={"CompletedOrders"},
     *     summary="Update a specific CompletedOrder",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="CompletedOrder ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="CompletedOrder updated successfully"),
     *     @OA\Response(response="404", description="CompletedOrder not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(Request $request, CompletedOrder $CompletedOrder)
    {
        try {
            $request->validate([
                'status' => 'required',
            ]);

            $CompletedOrder->update($request->all());

            if ($CompletedOrder->status == "completed") {
                $CompletedOrder->delete();
            }

            return response()->json(['message' => 'CompletedOrder updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating CompletedOrder'], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/CompletedOrders/{id}",
     *     tags={"CompletedOrders"},
     *     summary="Delete a specific CompletedOrder",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="CompletedOrder ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="CompletedOrder deleted successfully"),
     *     @OA\Response(response="404", description="CompletedOrder not found"),
     * )
     */
    public function destroy(CompletedOrder $CompletedOrder)
    {
        try {
            $CompletedOrder->delete();
            return response()->json(['message' => 'CompletedOrder deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting CompletedOrder'], 500);
        }
    }
}
