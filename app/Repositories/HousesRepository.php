<?php

namespace App\Repositories;

use App\Contracts\Repositories\HousesRepositoryContract;

use App\Models\House;
use Illuminate\Support\Collection;
//use Illuminate\Support\Facades\Cache; // может реализовать? эх редиска

class HousesRepository implements HousesRepositoryContract
{
    public function __construct(private readonly House $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function getById(int $id, array $relations = []): House
    {
        
        return $this->getModel()
            ->when($relations, fn ($query) => $query->with($relations))
            ->findOrFail($id);
        
    }

    public function create(array $fields): House
    {
        return $this->getModel()->create($fields);
    }

    public function update(House $house, array $fields): House
    {
        $house->update($fields);
        
        return $house;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function syncWithoutDetachingImages(House $house, array $images): House
    {
        $house->images()->syncWithoutDetaching($images);

        return $house;
    }

    public function getModel(): House
    {
        return $this->model;
    }

}