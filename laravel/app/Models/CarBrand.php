<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBrand extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $fillable = ['name'];

    protected array $cascadeDeletes = ['carModels'];

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}
