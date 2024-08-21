<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/* 
|  название переменной должно совпадать {product} = $product | product - название метода
|  public function product($product)
|  {product?} - (?)не обязательный параметр | ->where(); - можно ограничить доступные значения параметра
*/

Route::get('/test', function() {
    return view('test');
})->name('test');

Route::get('/',  [PagesController::class, 'home'])->name('home'); // подключение PagesController и его метод home   (get)

Route::get('/construction',  [PagesController::class, 'construction'])->name('construction'); // в href использовать route('construction')

Route::get('/renovation',  [PagesController::class, 'renovation'])->name('renovation'); // страница ремонта
