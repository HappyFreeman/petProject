<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image_id']; // название полей которые можно массово заполнять

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function images(): BelongsToMany // m m
    {
        return $this->belongsToMany(Image::class);
    }

    public function imageUrl(): Attribute // переопределяем значение поля image. аксессор(get)
    {
        return Attribute::get(fn () => $this->image?->url ?: '/assets/images/no_image.png');
    }

    public function name(): Attribute // мутатор(set) - изменяет данные перед отправкой в бд
    {
        return Attribute::set(fn ($value) => ucfirst($value)); // меняем 1ю букву на заглавнию
    }
}
