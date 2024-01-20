<?php

namespace App\Http\Resources;

use App\Models\CarBrand;

class CarModelResource extends CarResourceAbstract
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'brand' => CarBrand::find($this->car_brand_id),
            'created_at' => $this->dateNormalize($this->created_at),
            'updated_at' => $this->dateNormalize($this->updated_at),
            'deleted_at' => $this->dateNormalize($this->deleted_at),
        ];
    }
}
