<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products/{lang}",
     *     tags={"Products"},
     *     summary="Get list of products",
     *     @OA\Parameter(
     *         name="lang",
     *         in="path",
     *         description="Language code",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="List of products"),
     *     @OA\Response(response="400", description="Invalid language code"),
     *     @OA\Response(response="500", description="Internal Server Error")
     * )
     */
    public function index()
    {
        try {
            $products = Product::all();
            $products->each(function ($product) {
                $product->img_url = asset('storage/products/' . $product->img);
            });
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Create a new product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="desc", type="string"),
     *             @OA\Property(property="img", type="string", format="binary"),
     *             @OA\Property(property="price", type="number", format="float"),
     *             @OA\Property(property="discount", type="number", format="float"),
     *             @OA\Property(property="category_id", type="integer"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Product created successfully"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'desc' => 'required',
                'img' => 'required|image|mimes:png,jpg|max:2048',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
            ]);

            $requestData = $request->all();

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $destinationPath = 'storage/products';
                $file->move($destinationPath, $fileName);
                $requestData['img'] = $fileName;
            } else {
                $requestData['img'] = 'nofoto.jpg';
            }

            Product::create($requestData);

            return response()->json(['message' => 'Product added successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error adding product'], 500);
        }
    }
    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Display the specified product",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Product details"),
     *     @OA\Response(response="404", description="Product not found"),
     *     @OA\Response(response="500", description="Internal Server Error"),
     * )
     */
    public function show(Product $product)
    {
        try {
            return view('Product.show', compact('product'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Update a specific product",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="desc", type="string"),
     *             @OA\Property(property="img", type="string", format="binary"),
     *             @OA\Property(property="price", type="number", format="float"),
     *             @OA\Property(property="discount", type="number", format="float"),
     *             @OA\Property(property="category_id", type="integer"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Product updated successfully"),
     *     @OA\Response(response="404", description="Product not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(Request $request, Product $product)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'desc' => 'required',
                'category_id' => 'required',
                'img' => 'image',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
            ]);

            $requestData = $request->all();

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $destinationPath = 'storage/products';
                $file->move($destinationPath, $file->getClientOriginalName());
                $requestData['img'] = $file->getClientOriginalName();
            } else {
                $requestData['img'] = $product->img;
            }

            $product->update($requestData);

            return response()->json(['message' => 'Product updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating product'], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Delete a specific product",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Product deleted successfully"),
     *     @OA\Response(response="404", description="Product not found"),
     * )
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting product'], 500);
        }
    }

}
