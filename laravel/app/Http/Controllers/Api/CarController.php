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
        $thisTrashed = false;
        $filterName = FilterEnum::DEFAULT_KEY->value;
        $direction = false;

        if ($request->has('filter')) {
            $filter = $request->input('filter');
        } else {
            $filter = [FilterEnum::DEFAULT_KEY->value => FilterEnum::ASC->value];
        }

        switch ($filter) {
            case array_key_first($filter) === FilterEnum::NUMBER->value:
                $filterName = FilterEnum::CAR_NUMBER_KEY->value;
                $direction = (bool)$filter[FilterEnum::NUMBER->value];
                break;
            case array_key_first($filter) === FilterEnum::BRAND->value:
                $filterName = FilterEnum::BRAND_KEY->value;
                $direction = (bool)$filter[FilterEnum::BRAND->value];
                break;
            case array_key_first($filter) === FilterEnum::MODEL->value:
                $filterName = FilterEnum::MODEL_KEY->value;
                $direction = (bool)$filter[FilterEnum::MODEL->value];
                break;
            case array_key_first($filter) === FilterEnum::SOFT_DELETED->value:
                $thisTrashed = (bool)$filter[FilterEnum::SOFT_DELETED->value];
                break;
        }

        $cars = Car::with(['carBrand', 'carModel'])
            ->when($thisTrashed, function($query) {
                $query->whereNotNull('deleted_at')->withTrashed();
            })
            ->get()
            ->sortBy($filterName, 0, $direction);

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
