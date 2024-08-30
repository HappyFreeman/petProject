<?php

namespace App\DTO;

class CatalogFilterDTO // пока нигде не использую)
{
    private ?string $model = null;
    private ?int $minPrice = 0;
    private ?int $maxPrice = 0;

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): CatalogFilterDTO
    {
        $this->model = $model;
        return $this;
    }

    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    public function setMinPrice(?int $minPrice): CatalogFilterDTO
    {
        $this->minPrice = $minPrice;
        return $this;
    }

    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(?int $maxPrice): CatalogFilterDTO
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }
}
