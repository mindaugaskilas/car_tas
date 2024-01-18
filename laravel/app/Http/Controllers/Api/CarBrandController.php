<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarBrandResource;
use App\Models\CarBrand;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarBrandController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CarBrandResource::collection(CarBrand::all());
    }

    public function show(int $id): CarBrandResource
    {
        return new CarBrandResource(CarBrand::find($id));
    }
}
