<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\HousesRepositoryContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct(private readonly HousesRepositoryContract $housesRepository)
    {
    }

    public function index(): View
    {
        return view('pages.portfolio.index', ['posts' => $this->housesRepository->findAll()]);
    }

    public function show($id): View
    {
        try {
            //$house = $this->housesRepository->getById((int) $id);
            $house = $this->housesRepository->getById((int) $id, ['image', 'images']);
        } catch (RequestException $exception) {
            abort(412);
        }
        return view('pages.portfolio.show', ['house' => $house]);
    }
}
