<?php

namespace App\Http\Resources;

class CarResource extends CarResourceAbstract
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
            'car_number' => $this->car_number,
            'fuel_tank_capacity' => $this->fuel_tank_capacity,
            'average_fuel_consumption' => $this->average_fuel_consumption,
            'car_brand' => $this->carBrand,
            'car_model' => $this->carModel,
            'created_at' => $this->dateNormalize($this->created_at),
            'updated_at' => $this->dateNormalize($this->updated_at),
            'deleted_at' => $this->dateNormalize($this->deleted_at),
        ];
    }
}
