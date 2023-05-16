<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Building;
use App\Models\Prioritie;
use Illuminate\Http\Request;
use App\Models\OrganizationalUnit;
use App\Http\Requests\OrganizationalUnitStoreRequest;
use App\Http\Requests\OrganizationalUnitUpdateRequest;

class OrganizationalUnitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', OrganizationalUnit::class);

        $search = $request->get('search', '');

        $organizationalUnits = OrganizationalUnit::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.organizational_units.index',
            compact('organizationalUnits', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', OrganizationalUnit::class);

        $campuses = Campus::pluck('name', 'id');
        $buildings = Building::pluck('name', 'id');
        $priorities = Prioritie::pluck('name', 'id');

        return view(
            'app.organizational_units.create',
            compact('campuses', 'buildings', 'priorities')
        );
    }

    /**
     * @param \App\Http\Requests\OrganizationalUnitStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationalUnitStoreRequest $request)
    {
        $this->authorize('create', OrganizationalUnit::class);

        $validated = $request->validated();

        $organizationalUnit = OrganizationalUnit::create($validated);

        return redirect()
            ->route('organizational-units.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrganizationalUnit $organizationalUnit
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        OrganizationalUnit $organizationalUnit
    ) {
        $this->authorize('view', $organizationalUnit);

        return view(
            'app.organizational_units.show',
            compact('organizationalUnit')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrganizationalUnit $organizationalUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        OrganizationalUnit $organizationalUnit
    ) {
        $this->authorize('update', $organizationalUnit);

        $campuses = Campus::pluck('name', 'id');
        $buildings = Building::pluck('name', 'id');
        $priorities = Prioritie::pluck('name', 'id');

        return view(
            'app.organizational_units.edit',
            compact('organizationalUnit', 'campuses', 'buildings', 'priorities')
        );
    }

    /**
     * @param \App\Http\Requests\OrganizationalUnitUpdateRequest $request
     * @param \App\Models\OrganizationalUnit $organizationalUnit
     * @return \Illuminate\Http\Response
     */
    public function update(
        OrganizationalUnitUpdateRequest $request,
        OrganizationalUnit $organizationalUnit
    ) {
        $this->authorize('update', $organizationalUnit);

        $validated = $request->validated();

        $organizationalUnit->update($validated);

        return redirect()
            ->route('organizational-units.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrganizationalUnit $organizationalUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        OrganizationalUnit $organizationalUnit
    ) {
        $this->authorize('delete', $organizationalUnit);

        $organizationalUnit->delete();

        return redirect()
            ->route('organizational-units.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
