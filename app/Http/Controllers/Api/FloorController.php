<?php

namespace App\Http\Controllers\Api;

use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FloorResource;
use App\Http\Resources\FloorCollection;
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
            ->paginate();

        return new FloorCollection($floors);
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

        return new FloorResource($floor);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Floor $floor)
    {
        $this->authorize('view', $floor);

        return new FloorResource($floor);
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

        return new FloorResource($floor);
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

        return response()->noContent();
    }
}
