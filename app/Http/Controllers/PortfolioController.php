<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\HousesRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct(private readonly HousesRepositoryContract $housesRepository)
    {
    }

    public function index(
        Request $request,
        CatalogDataCollectorServiceContract $catalogDataCollector
    ): View {
        $housesData = $catalogDataCollector->collectCatalogData(
            10,
            $request->get('page', 1)
        );
        return view('pages.portfolio.index', ['housesData' => $housesData]);
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
