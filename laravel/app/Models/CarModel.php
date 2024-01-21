<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'car_brand_id'];

    public function carBrand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id');
    }
}
