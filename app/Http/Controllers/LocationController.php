<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view('Location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Location.create');
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
            'number' => 'required',
            'email' => 'required|email',
            'location_uz' => 'required',
            'location_ru' => 'required',
            'location_en' => 'required',
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')->with('success', __('words.ProductAddedSuccessfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return view('Location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('Location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            'location_uz' => 'required',
            'location_ru' => 'required',
            'location_en' => 'required',
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', __('words.ProductUpdatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', __('words.ProductDeletedSuccessfully'));
    }
}
