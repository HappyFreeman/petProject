<?php

namespace App\Providers;

use App\Contracts\Services\HouseCreationServiceContract;
use App\Contracts\Services\HouseUpdateServiceContract;
use App\Contracts\Services\HouseRemoverServiceContract;
use App\Contracts\Services\ImagesServiceContract;

use App\Services\HousesService;
use App\Services\ImagesService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /*
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(Config::get('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });
        */

        $this->app->singleton(HouseCreationServiceContract::class, HousesService::class);
        $this->app->singleton(HouseUpdateServiceContract::class, HousesService::class);
        $this->app->singleton(HouseRemoverServiceContract::class, HousesService::class);

        /*
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']);
        });
        */
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
