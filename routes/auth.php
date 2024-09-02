<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::middleware(RedirectIfAuthenticated::class)->group(function () { // не авторизован
    
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login')
    ;

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(Authenticate::class)->group(function () {  // авторизован
    
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout')
    ;

});
