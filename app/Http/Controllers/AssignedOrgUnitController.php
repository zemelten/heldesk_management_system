<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignedOffice;
use App\Models\AssignedOrgUnit;
use App\Models\OrganizationalUnit;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.assigned_org_units.index',
            compact('assignedOrgUnits', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', AssignedOrgUnit::class);

        $assignedOffices = AssignedOffice::pluck('office_no', 'id');
        $organizationalUnits = OrganizationalUnit::pluck('name', 'id');

        return view(
            'app.assigned_org_units.create',
            compact('assignedOffices', 'organizationalUnits')
        );
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

        return redirect()
            ->route('assigned-org-units.edit', $assignedOrgUnit)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignedOrgUnit $assignedOrgUnit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssignedOrgUnit $assignedOrgUnit)
    {
        $this->authorize('view', $assignedOrgUnit);

        return view('app.assigned_org_units.show', compact('assignedOrgUnit'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignedOrgUnit $assignedOrgUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AssignedOrgUnit $assignedOrgUnit)
    {
        $this->authorize('update', $assignedOrgUnit);

        $assignedOffices = AssignedOffice::pluck('office_no', 'id');
        $organizationalUnits = OrganizationalUnit::pluck('name', 'id');

        return view(
            'app.assigned_org_units.edit',
            compact('assignedOrgUnit', 'assignedOffices', 'organizationalUnits')
        );
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

        return redirect()
            ->route('assigned-org-units.edit', $assignedOrgUnit)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('assigned-org-units.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
