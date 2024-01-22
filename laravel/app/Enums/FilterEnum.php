<?php

namespace App\Enums;

enum FilterEnum: string
{
    case NUMBER = 'number';
    case BRAND = 'brand';
    case MODEL = 'model';
    case SOFT_DELETED = 'soft_deleted';
}
