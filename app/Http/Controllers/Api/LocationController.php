<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller {
    /**
     * @OA\Get(
     *     path="/api/locations",
     *     tags={"Locations"},
     *     summary="Get list of locations",
     *     @OA\Response(response="200", description="List of locations")
     * )
     */
    public function index() {
        try {
            $locations = Location::all();
            return response()->json(['locations' => $locations], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/locations/{id}",
     *     tags={"Locations"},
     *     summary="Get a specific location",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Location ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Location details"),
     *     @OA\Response(response="404", description="Location not found"),
     * )
     */
    public function show(Location $location) {
        try {
            return response()->json(['location' => $location], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/locations",
     *     tags={"Locations"},
     *     summary="Create a new location",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="number", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="location", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Location created successfully"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function store(Request $request) {
        try {
            $this->validate($request, [
                'title' => 'required',
                'number' => 'required',
                'email' => 'required|email',
                'location' => 'required',
            ]);

            Location::create($request->all());

            return response()->json(['message' => 'Location added successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error adding location'], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/locations/{id}",
     *     tags={"Locations"},
     *     summary="Update a specific location",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Location ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="number", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="location", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Location updated successfully"),
     *     @OA\Response(response="404", description="Location not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(Request $request, Location $location) {
        try {
            $this->validate($request, [
                'title' => 'required',
                'number' => 'required',
                'email' => 'required|email',
                'location' => 'required',
            ]);

            $location->update($request->all());

            return response()->json(['message' => 'Location updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating location'], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/locations/{id}",
     *     tags={"Locations"},
     *     summary="Delete a specific location",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Location ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Location deleted successfully"),
     *     @OA\Response(response="404", description="Location not found"),
     * )
     */
    public function destroy(Location $location) {
        try {
            $location->delete();
            return response()->json(['message' => 'Location deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting location'], 500);
        }
    }
}
