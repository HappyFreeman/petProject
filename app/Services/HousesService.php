<?php

namespace App\Services;
use App\Contracts\Repositories\HousesRepositoryContract;
use App\Contracts\Services\HouseCreationServiceContract;
use App\Contracts\Services\HouseRemoverServiceContract;
use App\Contracts\Services\HouseUpdateServiceContract;
use App\Contracts\Services\ImagesServiceContract;

use App\Models\House;


class HousesService implements HouseCreationServiceContract, HouseUpdateServiceContract, HouseRemoverServiceContract
{
    public function __construct(
        private readonly HousesRepositoryContract $housesRepository,
        private readonly ImagesServiceContract $imagesService
    ) {
    }

    public function create(array $fields): House
    {
        // Основное изображение
        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
        }

        // дополнительные
        $imagesId = [];
        if (! empty($fields['images'])) {
            foreach ($fields['images'] as $image) {
                $temp = $this->imagesService->createImage($image); // загружаем на сервер
                //$temp->id;
                $imagesId[] = $temp->id;
            }
        }

        $house = $this->housesRepository->create($fields);
        
        if(! empty($imagesId)) {
            $this->housesRepository->syncWithoutDetachingImages($house, $imagesId);
        }

        return $house;
    }

    public function update(int $id, array $fields): House
    {
        
        $house = $this->housesRepository->getById($id);
        $oldImageId = null;

        // Основное изображение
        if (! empty($fields['image'])) { // если загрузили новое титульное изображение
            $image = $this->imagesService->createImage($fields['image']); // загружаем на сервер
            $fields['image_id'] = $image->id;
            $oldImageId = $house->image_id;
        }

        // дополнительные
        $imagesId = [];
        if (! empty($fields['images'])) {
            foreach ($fields['images'] as $image) {
                $temp = $this->imagesService->createImage($image); // загружаем на сервер
                //$temp->id;
                $imagesId[] = $temp->id;
            }
        }
        
        $this->housesRepository->update($house, $fields);


        if(! empty($imagesId)) {
            $this->housesRepository->syncWithoutDetachingImages($house, $imagesId);
        }

        if (! empty($oldImageId)) { // удаляем старое титульное изображение
            $this->imagesService->deleteImage($oldImageId);
        }

        return $house;
    }

    public function delete(int $id)
    {
        $house = $this->housesRepository->getById($id);

        if (! empty($car->image_id)) {
            $this->imagesService->deleteImage($house->image_id);
        }

        $this->housesRepository->delete($id);
    }

}