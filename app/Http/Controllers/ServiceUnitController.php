<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\ServiceUnit;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceUnitStoreRequest;
use App\Http\Requests\ServiceUnitUpdateRequest;

class ServiceUnitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ServiceUnit::class);

        $search = $request->get('search', '');

        $serviceUnits = ServiceUnit::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.service_units.index',
            compact('serviceUnits', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ServiceUnit::class);

        $leaders = Leader::pluck('full_name', 'id');

        return view('app.service_units.create', compact('leaders'));
    }

    /**
     * @param \App\Http\Requests\ServiceUnitStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceUnitStoreRequest $request)
    {
        $this->authorize('create', ServiceUnit::class);

        $validated = $request->validated();

        $serviceUnit = ServiceUnit::create($validated);

        return redirect()
            ->route('service-units.edit', $serviceUnit)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceUnit $serviceUnit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ServiceUnit $serviceUnit)
    {
        $this->authorize('view', $serviceUnit);

        return view('app.service_units.show', compact('serviceUnit'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceUnit $serviceUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ServiceUnit $serviceUnit)
    {
        $this->authorize('update', $serviceUnit);

        $leaders = Leader::pluck('full_name', 'id');

        return view(
            'app.service_units.edit',
            compact('serviceUnit', 'leaders')
        );
    }

    /**
     * @param \App\Http\Requests\ServiceUnitUpdateRequest $request
     * @param \App\Models\ServiceUnit $serviceUnit
     * @return \Illuminate\Http\Response
     */
    public function update(
        ServiceUnitUpdateRequest $request,
        ServiceUnit $serviceUnit
    ) {
        $this->authorize('update', $serviceUnit);

        $validated = $request->validated();

        $serviceUnit->update($validated);

        return redirect()
            ->route('service-units.edit', $serviceUnit)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ServiceUnit $serviceUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ServiceUnit $serviceUnit)
    {
        $this->authorize('delete', $serviceUnit);

        $serviceUnit->delete();

        return redirect()
            ->route('service-units.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
