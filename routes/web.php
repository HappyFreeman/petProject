<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\HousesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Illuminate\Routing\Router;


/* 
|  название переменной должно совпадать {product} = $product | product - название метода
|  public function product($product)
|  {product?} - (?)не обязательный параметр | ->where(); - можно ограничить доступные значения параметра
*/

Route::get('/test', function() {
    return view('test');
})->name('test')->middleware(Authenticate::class); // доступ только авторизованным пользователям



Route::get('/',  [PagesController::class, 'home'])->name('home'); // подключение PagesController и его метод home   (get)

Route::get('/construction',  [PagesController::class, 'construction'])->name('construction'); // в href использовать route('construction')

Route::get('/renovation',  [PagesController::class, 'renovation'])->name('renovation'); // страница ремонта

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
//Route::get('/portfolio/{house:slug}', [PortfolioController::class, 'show'])->name('portfolio.show'); // :id вроде по дефолту
Route::get('/portfolio/{house}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(Authenticate::class) // доступ только авторизованным пользователям
    ->group(function (Router $router) {
        $router->get('/', [AdminPagesController::class, 'admin'])->name('admin');
        $router->resource('houses', HousesController::class)->except(['show']); // стандарт rest | except(['show']) - исключает метод show
        $router->delete('houses/images/{image}', [HousesController::class, 'destroyImage'])->name('houses.images.destroy');
    })
;
