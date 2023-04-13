<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProblemCatagory;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProblemCatagoryResource;
use App\Http\Resources\ProblemCatagoryCollection;
use App\Http\Requests\ProblemCatagoryStoreRequest;
use App\Http\Requests\ProblemCatagoryUpdateRequest;

class ProblemCatagoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ProblemCatagory::class);

        $search = $request->get('search', '');

        $problemCatagories = ProblemCatagory::search($search)
            ->latest()
            ->paginate();

        return new ProblemCatagoryCollection($problemCatagories);
    }

    /**
     * @param \App\Http\Requests\ProblemCatagoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProblemCatagoryStoreRequest $request)
    {
        $this->authorize('create', ProblemCatagory::class);

        $validated = $request->validated();

        $problemCatagory = ProblemCatagory::create($validated);

        return new ProblemCatagoryResource($problemCatagory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemCatagory $problemCatagory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProblemCatagory $problemCatagory)
    {
        $this->authorize('view', $problemCatagory);

        return new ProblemCatagoryResource($problemCatagory);
    }

    /**
     * @param \App\Http\Requests\ProblemCatagoryUpdateRequest $request
     * @param \App\Models\ProblemCatagory $problemCatagory
     * @return \Illuminate\Http\Response
     */
    public function update(
        ProblemCatagoryUpdateRequest $request,
        ProblemCatagory $problemCatagory
    ) {
        $this->authorize('update', $problemCatagory);

        $validated = $request->validated();

        $problemCatagory->update($validated);

        return new ProblemCatagoryResource($problemCatagory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemCatagory $problemCatagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProblemCatagory $problemCatagory)
    {
        $this->authorize('delete', $problemCatagory);

        $problemCatagory->delete();

        return response()->noContent();
    }
}
