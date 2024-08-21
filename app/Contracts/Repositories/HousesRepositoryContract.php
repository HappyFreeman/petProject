<?php

namespace App\Contracts\Repositories;

use App\Models\House;
use Illuminate\Support\Collection;

interface HousesRepositoryContract
{
    public function findAll(): Collection;

    public function getModel(): House;

    public function getById(int $id, array $relations = []): House;

    public function create(array $fields): House;

    public function update(House $house, array $fields): House;

    public function delete(int $id): void;

    public function syncWithoutDetachingImages(House $house, array $images): House;
}