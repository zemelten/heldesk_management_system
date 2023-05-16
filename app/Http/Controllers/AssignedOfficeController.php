<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use App\Models\AssignedOffice;
use App\Http\Requests\AssignedOfficeStoreRequest;
use App\Http\Requests\AssignedOfficeUpdateRequest;

class AssignedOfficeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AssignedOffice::class);

        $search = $request->get('search', '');

        $assignedOffices = AssignedOffice::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.assigned_offices.index',
            compact('assignedOffices', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', AssignedOffice::class);

        $buildings = Building::pluck('name', 'id');

        return view('app.assigned_offices.create', compact('buildings'));
    }

    /**
     * @param \App\Http\Requests\AssignedOfficeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignedOfficeStoreRequest $request)
    {
        $this->authorize('create', AssignedOffice::class);

        $validated = $request->validated();

        $assignedOffice = AssignedOffice::create($validated);

        return redirect()
            ->route('assigned-offices.index', $assignedOffice)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignedOffice $assignedOffice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssignedOffice $assignedOffice)
    {
        $this->authorize('view', $assignedOffice);

        return view('app.assigned_offices.show', compact('assignedOffice'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignedOffice $assignedOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AssignedOffice $assignedOffice)
    {
        $this->authorize('update', $assignedOffice);

        $buildings = Building::pluck('name', 'id');

        return view(
            'app.assigned_offices.index',
            compact('assignedOffice', 'buildings')
        );
    }

    /**
     * @param \App\Http\Requests\AssignedOfficeUpdateRequest $request
     * @param \App\Models\AssignedOffice $assignedOffice
     * @return \Illuminate\Http\Response
     */
    public function update(
        AssignedOfficeUpdateRequest $request,
        AssignedOffice $assignedOffice
    ) {
        $this->authorize('update', $assignedOffice);

        $validated = $request->validated();

        $assignedOffice->update($validated);

        return redirect()
            ->route('assigned-offices.edit', $assignedOffice)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssignedOffice $assignedOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AssignedOffice $assignedOffice)
    {
        $this->authorize('delete', $assignedOffice);

        $assignedOffice->delete();

        return redirect()
            ->route('assigned-offices.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
