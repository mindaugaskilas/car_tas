<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarBrandRequest;
use App\Http\Requests\UpdateCarBrandRequest;
use App\Http\Resources\CarBrandResource;
use App\Models\CarBrand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarBrandController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CarBrandResource::collection(CarBrand::all());
    }

    public function show(int $id): CarBrandResource
    {
        return new CarBrandResource((new CarBrand)->find($id));
    }

    public function store(StoreCarBrandRequest $request): JsonResponse
    {
        $carBrand = (new CarBrand)->create($request->all());

        return response()->json($carBrand, 201);
    }

    public function update(UpdateCarBrandRequest $request, int $id): JsonResponse
    {
        $carBrand = (new CarBrand)->findOrFail($id);
        $carBrand->update($request->all());

        return response()->json(new CarBrandResource($carBrand), 200);
    }

    public function destroy(int $id): JsonResponse
    {
        (new CarBrand)->find($id)->delete();

        return response()->json(null, 204);
    }
}
