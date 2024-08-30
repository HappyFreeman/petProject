<?php

namespace App\Services;

use App\Contracts\Repositories\HousesRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\DTO\CatalogDataDTO;

class CatalogDataCollectorService implements CatalogDataCollectorServiceContract
{
    public function __construct(
        private readonly HousesRepositoryContract $housesRepository
    ) {
    }
    public function collectCatalogData(
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
    ): CatalogDataDTO {
        $houses = $this->housesRepository->paginateForCatalog(
            $perPage,
            $page,
            ['*'],
            $pageName,
            ['image'] // добавил связи (Проблему N + 1 запросов надо решать)
        );

        return new CatalogDataDTO($houses); 
    }
}