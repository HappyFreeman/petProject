<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;

class PagesController extends Controller
{
    public function construction(): Factory|View|Application  // страница строительство
    {
        return view('pages.construction'); // pages/construction.blade.php
    }

    public function home(): Factory|View|Application  // главная страница
    {
        return view('pages.home'); // pages/home.blade.php
    }

    public function renovation(): Factory|View|Application  // страница ремонта
    {
        return view('pages.renovation'); // pages/renovation.blade.php
    }

    public function portfolio(): Factory|View|Application  // страница портфолио
    {
        return view('pages.portfolio'); // pages/portfolio.blade.php
    }
}
