<?php

namespace App\Http\Controllers;

use App\Models\Prioritie;
use Illuminate\Http\Request;
use App\Http\Requests\PrioritieStoreRequest;
use App\Http\Requests\PrioritieUpdateRequest;

class PrioritieController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Prioritie::class);

        $search = $request->get('search', '');

        $priorities = Prioritie::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.priorities.index', compact('priorities', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Prioritie::class);

        return view('app.priorities.create');
    }

    /**
     * @param \App\Http\Requests\PrioritieStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrioritieStoreRequest $request)
    {
        $this->authorize('create', Prioritie::class);

        $validated = $request->validated();

        $prioritie = Prioritie::create($validated);

        return redirect()
            ->route('priorities.edit', $prioritie)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Prioritie $prioritie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Prioritie $prioritie)
    {
        $this->authorize('view', $prioritie);

        return view('app.priorities.show', compact('prioritie'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Prioritie $prioritie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Prioritie $prioritie)
    {
        $this->authorize('update', $prioritie);

        return view('app.priorities.edit', compact('prioritie'));
    }

    /**
     * @param \App\Http\Requests\PrioritieUpdateRequest $request
     * @param \App\Models\Prioritie $prioritie
     * @return \Illuminate\Http\Response
     */
    public function update(
        PrioritieUpdateRequest $request,
        Prioritie $prioritie
    ) {
        $this->authorize('update', $prioritie);

        $validated = $request->validated();

        $prioritie->update($validated);

        return redirect()
            ->route('priorities.edit', $prioritie)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Prioritie $prioritie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Prioritie $prioritie)
    {
        $this->authorize('delete', $prioritie);

        $prioritie->delete();

        return redirect()
            ->route('priorities.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
