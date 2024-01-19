<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'car_number' => 'required|unique:cars',
            'fuel_tank_capacity' => 'required',
            'average_fuel_consumption' => 'required',
            'car_brand_id' => 'required',
            'car_model_id' => 'required',
        ];
    }
}
