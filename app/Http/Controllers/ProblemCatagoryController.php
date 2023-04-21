<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProblemCatagory;
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
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.problem_catagories.index',
            compact('problemCatagories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ProblemCatagory::class);

        return view('app.problem_catagories.create');
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

        return redirect()
            ->route('problem-catagories.edit', $problemCatagory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemCatagory $problemCatagory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProblemCatagory $problemCatagory)
    {
        $this->authorize('view', $problemCatagory);

        return view('app.problem_catagories.show', compact('problemCatagory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemCatagory $problemCatagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProblemCatagory $problemCatagory)
    {
        $this->authorize('update', $problemCatagory);

        return view('app.problem_catagories.edit', compact('problemCatagory'));
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

        return redirect()
            ->route('problem-catagories.edit', $problemCatagory)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('problem-catagories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
