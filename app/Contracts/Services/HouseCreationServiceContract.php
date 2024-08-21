<?php

namespace App\Contracts\Services;
use App\Models\House;

interface HouseCreationServiceContract
{
    public function create(array $fields): House;
}