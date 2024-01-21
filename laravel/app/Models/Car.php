<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Car
 *
 * @mixin Builder
 */
class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'car_number',
        'fuel_tank_capacity',
        'average_fuel_consumption',
        'car_brand_id',
        'car_model_id'
    ];

    public function carBrand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id');
    }

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }
}
