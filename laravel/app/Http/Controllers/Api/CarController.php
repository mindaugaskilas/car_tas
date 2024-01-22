<?php

namespace App\Http\Controllers\Api;

use App\Enums\FilterEnum;
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
    public function index(Request $request): AnonymousResourceCollection
    {
        $filter = $request->query();
        $number = $filter[FilterEnum::NUMBER->value] ?? '';
        $brand = $filter[FilterEnum::BRAND->value] ?? '';
        $model = $filter[FilterEnum::MODEL->value] ?? '';
        $thisTrashed = isset($filter[FilterEnum::SOFT_DELETED->value]) && $filter[FilterEnum::SOFT_DELETED->value];

        $cars = Car::with(['carBrand', 'carModel'])
            ->when($thisTrashed, function($query) {
                $query->whereNotNull('deleted_at')->withTrashed();
            })
            ->when($filter, function ($query) use ($filter, $number, $brand, $model) {
                $query->where('car_number', 'like', '%' . $number . '%')
            ->whereHas('carBrand', function ($query) use ($filter, $brand) {
                $query->where('name', 'like', '%' . $brand . '%');
            })
            ->whereHas('carModel', function ($query) use ($filter, $model) {
                $query->where('name', 'like', '%' . $model . '%');
            });

            return $query;
        })->get();

        return CarResource::collection($cars);
    }

    public function show(int $id): CarResource
    {
        return new CarResource((new Car)->find($id));
    }

    public function store(StoreCarRequest $request): JsonResponse
    {
        $carModel = (new Car)->create($request->all());

        return response()->json($carModel, 201);
    }

    public function update(UpdateCarRequest $request, int $id): JsonResponse
    {
        $carModel = (new Car)->findOrFail($id);
        $carModel->update($request->all());

        return response()->json(new CarResource($carModel), 200);
    }

    public function destroy(int $id): JsonResponse
    {
        (new Car)->find($id)->delete();

        return response()->json(null, 204);
    }
}
