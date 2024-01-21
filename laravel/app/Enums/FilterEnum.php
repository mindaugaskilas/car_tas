<?php

namespace App\Enums;

enum FilterEnum: string
{
    case NUMBER = 'number';
    case BRAND = 'brand';
    case MODEL = 'model';
    case SOFT_DELETED = 'soft_deleted';
    case CAR_NUMBER_KEY = 'car_number';
    case DEFAULT_KEY = 'id';
    case MODEL_KEY = 'carModel.name';
    case BRAND_KEY = 'carBrand.name';
    case ASC = 'asc';
}
