<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Requests\BuildingStoreRequest;
use App\Http\Requests\BuildingUpdateRequest;

class BuildingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Building::class);

        $search = $request->get('search', '');

        $buildings = Building::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return view('app.buildings.index', compact('buildings', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Building::class);

        $campuses = Campus::pluck('name', 'id');

        return view('app.buildings.create', compact('campuses'));
    }

    /**
     * @param \App\Http\Requests\BuildingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildingStoreRequest $request)
    {
        $this->authorize('create', Building::class);

        $validated = $request->validated();

        $building = Building::create($validated);

        return redirect()
            ->route('buildings.edit', $building)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Building $building
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Building $building)
    {
        $this->authorize('view', $building);

        return view('app.buildings.show', compact('building'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Building $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Building $building)
    {
        $this->authorize('update', $building);

        $campuses = Campus::pluck('name', 'id');

        return view('app.buildings.edit', compact('building', 'campuses'));
    }

    /**
     * @param \App\Http\Requests\BuildingUpdateRequest $request
     * @param \App\Models\Building $building
     * @return \Illuminate\Http\Response
     */
    public function update(BuildingUpdateRequest $request, Building $building)
    {
        $this->authorize('update', $building);

        $validated = $request->validated();

        $building->update($validated);

        return redirect()
            ->route('buildings.edit', $building)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Building $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Building $building)
    {
        $this->authorize('delete', $building);

        $building->delete();

        return redirect()
            ->route('buildings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
