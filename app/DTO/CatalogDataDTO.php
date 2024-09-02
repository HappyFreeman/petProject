<?php

namespace App\DTO;
//use App\Models\Category; // у домов есть категории?
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CatalogDataDTO
{
    public function __construct(
        //public readonly CatalogFilterDTO $filter,
        public readonly LengthAwarePaginator $houses,
    ) {
    }
}