<?php

namespace App\Models;

use App\Contracts\Services\ImagesServiceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //public const STORAGE_DISK = 'public';

    protected $fillable = ['path'];

    public function url(): Attribute // переопределяем значение поля image. аксессор(get)
    {
        $imagesService = app(ImagesServiceContract::class);

        return Attribute::get(fn () => $this->path ? $imagesService->url($this->path) : null);
    }
}
