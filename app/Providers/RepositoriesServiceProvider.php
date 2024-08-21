<?php

namespace App\Providers;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Repositories\HousesRepositoryContract;

use App\Repositories\ImagesRepository;
use App\Repositories\HousesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider // не забыть добавить в файл конфигурации в config app.php
// регистрация теперь производится в bootstrap/providers.php а не config/app.php
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(HousesRepositoryContract::class, HousesRepository::class);
        $this->app->singleton(ImagesRepositoryContract::class, ImagesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
