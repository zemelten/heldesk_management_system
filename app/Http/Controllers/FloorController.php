<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Requests\FloorStoreRequest;
use App\Http\Requests\FloorUpdateRequest;

class FloorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Floor::class);

        $search = $request->get('search', '');

        $floors = Floor::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('app.floors.index', compact('floors', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Floor::class);

        return view('app.floors.create');
    }

    /**
     * @param \App\Http\Requests\FloorStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FloorStoreRequest $request)
    {
        $this->authorize('create', Floor::class);

        $validated = $request->validated();

        $floor = Floor::create($validated);

        return redirect()
            ->route('floors.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Floor $floor)
    {
        $this->authorize('view', $floor);

        return view('app.floors.show', compact('floor'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Floor $floor)
    {
        $this->authorize('update', $floor);

        return view('app.floors.edit', compact('floor'));
    }

    /**
     * @param \App\Http\Requests\FloorUpdateRequest $request
     * @param \App\Models\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function update(FloorUpdateRequest $request, Floor $floor)
    {
        $this->authorize('update', $floor);

        $validated = $request->validated();

        $floor->update($validated);

        return redirect()
            ->route('floors.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Floor $floor)
    {
        $this->authorize('delete', $floor);

        $floor->delete();

        return redirect()
            ->route('floors.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
