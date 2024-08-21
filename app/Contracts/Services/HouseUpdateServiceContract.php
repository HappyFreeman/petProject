<?php

namespace App\Contracts\Services;
use App\Models\House;

interface HouseUpdateServiceContract
{
    public function update(int $id, array $fields): House;
}