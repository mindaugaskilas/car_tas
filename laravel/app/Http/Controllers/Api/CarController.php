<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CarResource::collection(Car::all());
    }

    public function show(int $id): CarResource
    {
        return new CarResource(Car::find($id));
    }

    public function store(StoreCarRequest $request): JsonResponse
    {
        $carModel = Car::create($request->all());

        return response()->json($carModel, 201);
    }

    public function update(UpdateCarRequest $request, int $id)
    {
        $carModel = Car::findOrFail($id);
        $carModel->update($request->all());

        return $carModel;
    }

    public function destroy(int $id): JsonResponse
    {
        Car::find($id)->delete();

        return response()->json(null, 204);
    }
}
