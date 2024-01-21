<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarModelRequest;
use App\Http\Requests\UpdateCarModelRequest;
use App\Http\Resources\CarModelResource;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarModelController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CarModelResource::collection(CarModel::all());
    }

    public function store(StoreCarModelRequest $request)
    {
        $carModel = CarModel::create($request->all());

        return response()->json($carModel, 201);
    }

    public function show(int $id): CarModelResource
    {
        return new CarModelResource(CarModel::find($id));
    }

    public function update(UpdateCarModelRequest $request, int $id)
    {
        $carModel = CarModel::findOrFail($id);
        $carModel->update($request->all());

        return response()->json(new CarModelResource($carModel), 200);
    }

    public function destroy(int $id)
    {
        CarModel::find($id)->delete();

        return response()->json(null, 204);
    }
}
