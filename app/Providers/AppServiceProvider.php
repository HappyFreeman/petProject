<?php

namespace App\Providers;

use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\HouseCreationServiceContract;
use App\Contracts\Services\HouseUpdateServiceContract;
use App\Contracts\Services\HouseRemoverServiceContract;
use App\Contracts\Services\ImagesServiceContract;

use App\Contracts\Services\MessageLimiterContract;
use App\Services\CatalogDataCollectorService;
use App\Services\FlashMessage;
use App\Services\HousesService;
use App\Services\ImagesService;
use App\Services\MessageLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

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

        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(MessageLimiterContract::class, MessageLimiter::class);
        $this->app->singleton(FlashMessage::class, fn () => new FlashMessage($this->app->make(MessageLimiterContract::class), session()));
        
        $this->app->singleton(HouseCreationServiceContract::class, HousesService::class);
        $this->app->singleton(HouseUpdateServiceContract::class, HousesService::class);
        $this->app->singleton(HouseRemoverServiceContract::class, HousesService::class);

        
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']); // public
        });

        $this->app->singleton(CatalogDataCollectorServiceContract::class, CatalogDataCollectorService::class);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('errors', session('errors') ?: new ViewErrorBag);
    }
}
