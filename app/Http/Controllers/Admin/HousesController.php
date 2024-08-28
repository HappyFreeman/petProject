<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\HousesRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\HouseCreationServiceContract;
use App\Contracts\Services\HouseRemoverServiceContract;
use App\Contracts\Services\HouseUpdateServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Models\House;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class HousesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(private readonly HousesRepositoryContract $housesRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        //$this->authorize('viewAny', House::class);
        $houses = $this->housesRepository->findAll();
        //return view('admin.houses.index', compact('houses'));
        return view('pages.admin.houses.list', ['houses' => $houses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        //$this->authorize('create', House::class);
        return view('pages.admin.houses.create', ['house' => $this->housesRepository->getModel()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        HouseRequest $request,
        HouseCreationServiceContract $houseCreationService,
        FlashMessageContract $flashMessage
    ): RedirectResponse {
        //$this->authorize('create', House::class);

        $house = $houseCreationService->create($request->validated());

        $flashMessage->success('Проект успешно добавлен');

        return redirect()->route('admin.houses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $house = $this->housesRepository->getById($id, ['image', 'images']);
        //$this->authorize('update', $house);
        //$this->authorize('update', [House::class, $id]);
        return view('pages.admin.houses.edit', ['house' => $house]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        HouseRequest $request,
        int $id,
        HouseUpdateServiceContract $houseUpdateService,
        FlashMessageContract $flashMessage
    ): RedirectResponse {
        //$this->authorize('update', [House::class, $id]);
        $house = $houseUpdateService->update($id, $request->validated());
        
        //$flashMessage = new FlashMessage();
        $flashMessage->success('Проект успешно обновлен');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        int $id,
        HouseRemoverServiceContract $houseRemoverService,
        FlashMessageContract $flashMessage
    ): RedirectResponse {
        //$this->authorize('delete', [House::class, $id]); // сначала проверка

        $houseRemoverService->delete($id); // потом удаление

        $flashMessage->success('Проект успешно удален');

        return back();
    }
}
