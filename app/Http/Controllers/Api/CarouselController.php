<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request; // Make sure this use statement is present

class CarouselController extends Controller {
    /**
     * @OA\Get(
     *     path="/api/carousels",
     *     tags={"Carousels"},
     *     summary="Get list of carousels",
     *     @OA\Response(response="200", description="List of carousels")
     * )
     */
    public function index() {
        $carousels = Carousel::all();

        return response()->json($carousels);
    }

    /**
     * @OA\Post(
     *     path="/api/carousels",
     *     tags={"Carousels"},
     *     summary="Store a new carousel",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"title", "desc", "img"},
     *                 @OA\Property(property="title", type="string", example="Carousel Title"),
     *                 @OA\Property(property="desc", type="string", example="Carousel Description"),
     *                 @OA\Property(property="img", type="string", format="binary"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Carousel created successfully"),
     *     @OA\Response(response="422", description="Validation error")
     * )
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'img' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Additional validation rules for Carousel fields
        ]);

        $requestData = $request->all();

        if($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName(); // Unique filename
            $destinationPath = 'storage/carousels'; // Adjust the destination path
            $file->move($destinationPath, $fileName);
            $requestData['img'] = $fileName;
        } else {
            $requestData['img'] = 'nofoto.jpg';
        }

        // Additional logic for handling Carousel fields

        Carousel::create($requestData);

        return response()->json($requestData, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/carousels/{id}",
     *     tags={"Carousels"},
     *     summary="Get details of a specific carousel",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the carousel",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Carousel details"),
     *     @OA\Response(response="404", description="Carousel not found"),
     * )
     */
    public function show($id) {
        $carousel = Carousel::findOrFail($id);
        return response()->json($carousel, 201);
    }


    /**
     * @OA\Put(
     *     path="/api/carousels/{id}",
     *     tags={"Carousels"},
     *     summary="Update details of a specific carousel",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the carousel",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"title", "desc", "img"},
     *                 @OA\Property(property="title", type="string", example="Updated Carousel Title"),
     *                 @OA\Property(property="desc", type="string", example="Updated Carousel Description"),
     *                 @OA\Property(property="img", type="string",  example="Image Title"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Carousel updated successfully"),
     *     @OA\Response(response="404", description="Carousel not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(Request $request, $id) {
        $carousel = Carousel::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'img' => 'required',
        ]);

        $requestData = $request->all();

        $carousel->update($requestData);

        return response()->json($carousel, 201);

    }

    /**
     * @OA\Delete(
     *     path="/api/carousels/{id}",
     *     tags={"Carousels"},
     *     summary="Delete a carousel",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the carousel to delete",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Carousel deleted successfully"),
     *     @OA\Response(response="404", description="Carousel not found"),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function destroy(Carousel $carousel) {
        $carousel->delete();
        return response()->json("Successfully deleted!!", 204);
    }
}
                        