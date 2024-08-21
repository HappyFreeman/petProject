<?php

namespace App\Contracts\Services;

interface HouseRemoverServiceContract
{
    public function delete(int $id);
}