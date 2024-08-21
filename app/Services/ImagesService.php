<?php

namespace App\Services;

use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Models\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class ImagesService implements ImagesServiceContract
{
    public function __construct(
        private readonly string $disk,
        private readonly ImagesRepositoryContract $imagesRepository,
        ) {
    }

    public function saveFile(File | string $file): string // сохранение изображения внутри файловой системы без создания модели
    {
        if(! $file instanceof File) {
            $file = new File($file);
        }

        return Storage::disk($this->disk)->putFile('', new File($file));
    }
    public function createImage(File | string $file): Image //сохранение с созданием модели
    {
        return $this->imagesRepository->create($this->saveFile($file));
    }

    public function url(string $path): string
    {
        return Storage::disk($this->disk)->url($path);
    }

    public function deleteImage(Image | int $image)
    {
        if (! $image instanceof Image) {
            $image = $this->imagesRepository->getById($image);
            if (! $image) {
                return;
            }
        }

        Storage::disk($this->disk)->delete($image->path); // удаление на сервере

        $this->imagesRepository->delete($image->id); // удаление в бд
    }
}