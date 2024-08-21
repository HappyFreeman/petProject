<?php

namespace App\Contracts\Services;

use App\Models\Image;
use Illuminate\Http\File;

interface ImagesServiceContract
{
    public function saveFile(File | string $file): string; // сохранение изображения внутри файловой системы без создания модели

    public function createImage(File | string $file): Image; //сохранение с созданием модели

    public function url(string $path): string;

    public function deleteImage(Image | int $image);
}