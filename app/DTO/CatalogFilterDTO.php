<?php

namespace App\DTO;

class CatalogFilterDTO
{
    private ?string $name = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): CatalogFilterDTO
    {
        $this->name = $name;
        return $this;
    }
}
