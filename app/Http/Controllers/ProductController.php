<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('Product.index', compact('products'));
    }

    public function apiIndex()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'desc_uz' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required',
            'category_id' => 'required',
            'img' => 'image',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Unique filename
            $destinationPath = 'storage/products';
            $file->move($destinationPath, $fileName);
            $requestData['img'] = $fileName;
        } else {
            $requestData['img'] = 'nofoto.jpg';
        }

        Product::create($requestData);

        return redirect()->route('products.index')->with('success', __('words.ProductAddedSuccessfully'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('Product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('Product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'desc_uz' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required',
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

        return redirect()->route('products.index')->with('warning', __('words.ProductUpdatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('danger', __('words.ProductDeletedSuccessfully'));
    }
}
