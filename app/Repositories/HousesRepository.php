<?php

namespace App\Repositories;

use App\Contracts\Repositories\HousesRepositoryContract;

use App\Models\House;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;
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

    public function paginateForCatalog(
        //CatalogFilterDTO $catalogFilterDTO,
        int $perPage = 10,
        int $page = 1,
        array $fields = ['*'],
        string $pageName = 'page',
        array $relations = []
    ): LengthAwarePaginator {
        
        return $this
            //->catalogQuery($catalogFilterDTO)
            ->getModel() // при реализации catalogQuery там получаем модель и фильтруем => эту строчку убрать
            ->with($relations)
            ->paginate($perPage, $fields, $pageName, $page)
        ;
    }

    public function getModel(): House
    {
        return $this->model;
    }

}