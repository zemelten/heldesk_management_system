<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\AssignedOrgUnit;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssignedOrgUnitResource;
use App\Http\Resources\AssignedOrgUnitCollection;
use App\Http\Requests\AssignedOrgUnitStoreRequest;
use App\Http\Requests\AssignedOrgUnitUpdateRequest;

class AssignedOrgUnitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AssignedOrgUnit::class);

        $search = $request->get('search', '');

        $assignedOrgUnits = AssignedOrgUnit::search($search)
            ->latest()
            ->paginate();

        return new AssignedOrgUnitCollection($assignedOrgUnits);
    }

    /**
     * @param \App\Http\Requests\AssignedOrgUnitStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignedOrgUnitStoreRequest $request)
    {
        $this->authorize('create', AssignedOrgUnit::class);

        $validated = $request->validated();

        $assignedOrgUnit = AssignedOrgUnit::create($validated);

        return new AssignedOrgUnitResource($assignedOrgUnit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignedOrgUnit $assignedOrgUnit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssignedOrgUnit $assignedOrgUnit)
    {
        $this->authorize('view', $assignedOrgUnit);

        return new AssignedOrgUnitResource($assignedOrgUnit);
    }

    /**
     * @param \App\Http\Requests\AssignedOrgUnitUpdateRequest $request
     * @param \App\Models\AssignedOrgUnit $assignedOrgUnit
     * @return \Illuminate\Http\Response
     */
    public function update(
        AssignedOrgUnitUpdateRequest $request,
        AssignedOrgUnit $assignedOrgUnit
    ) {
        $this->authorize('update', $assignedOrgUnit);

        $validated = $request->validated();

        $assignedOrgUnit->update($validated);

        return new AssignedOrgUnitResource($assignedOrgUnit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignedOrgUnit $assignedOrgUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AssignedOrgUnit $assignedOrgUnit)
    {
        $this->authorize('delete', $assignedOrgUnit);

        $assignedOrgUnit->delete();

        return response()->noContent();
    }
}
