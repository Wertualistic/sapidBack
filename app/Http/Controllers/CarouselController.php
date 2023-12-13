<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::all(); // Update the model name
        return view('carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Carousel $carousel)
    {
        return view('carousel.create', compact('carousel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'img' => 'required', // Adjust the max size as needed
            // Additional validation rules for Carousel fields
        ]);

        $requestData = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Unique filename
            $destinationPath = 'storage/carousels'; // Adjust the destination path
            $file->move($destinationPath, $fileName);
            $requestData['img'] = $fileName;
        } else {
            $requestData['img'] = 'nofoto.jpg';
        }

        // Additional logic for handling Carousel fields

        Carousel::create($requestData);

        return redirect()->route('carousels.index')->with('success', 'Carousel added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel) // Update the model name
    {
        return view('carousel.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel) // Update the model name
    {
        return view('carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'img' => 'image',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'storage/carousels'; // Adjust the destination path
            $fileName = time() . '_' . $file->getClientOriginalName(); // Unique filename
            $file->move($destinationPath, $fileName);
            $requestData['img'] = $fileName;
        } else {
            $requestData['img'] = $carousel->img;
        }

        // Additional logic for handling Carousel fields

        $carousel->update($requestData);

        return redirect()->route('carousels.index')->with('warning', 'Carousel updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel) // Update the model name
    {
        $carousel->delete();
        return redirect()->route('carousels.index')->with('danger', 'Carousel deleted successfully!');
    }
}
