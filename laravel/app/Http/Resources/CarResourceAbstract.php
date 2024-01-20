<?php

namespace App\Http\Resources;

use DateTimeImmutable;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class CarResourceAbstract extends JsonResource
{
    protected function dateNormalize($date): string
    {
        $dateImmutable = new DateTimeImmutable($date);

        return $dateImmutable->format('Y-m-d H:i:s');
    }
}
