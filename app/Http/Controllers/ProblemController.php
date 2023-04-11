<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use App\Models\ProblemCatagory;
use App\Http\Requests\ProblemStoreRequest;
use App\Http\Requests\ProblemUpdateRequest;

class ProblemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Problem::class);

        $search = $request->get('search', '');

        $problems = Problem::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.problems.index', compact('problems', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Problem::class);

        $problemCatagories = ProblemCatagory::pluck('name', 'id');

        return view('app.problems.create', compact('problemCatagories'));
    }

    /**
     * @param \App\Http\Requests\ProblemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProblemStoreRequest $request)
    {
        $this->authorize('create', Problem::class);

        $validated = $request->validated();

        $problem = Problem::create($validated);

        return redirect()
            ->route('problems.edit', $problem)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Problem $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Problem $problem)
    {
        $this->authorize('view', $problem);

        return view('app.problems.show', compact('problem'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Problem $problem
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Problem $problem)
    {
        $this->authorize('update', $problem);

        $problemCatagories = ProblemCatagory::pluck('name', 'id');

        return view(
            'app.problems.edit',
            compact('problem', 'problemCatagories')
        );
    }

    /**
     * @param \App\Http\Requests\ProblemUpdateRequest $request
     * @param \App\Models\Problem $problem
     * @return \Illuminate\Http\Response
     */
    public function update(ProblemUpdateRequest $request, Problem $problem)
    {
        $this->authorize('update', $problem);

        $validated = $request->validated();

        $problem->update($validated);

        return redirect()
            ->route('problems.edit', $problem)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Problem $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Problem $problem)
    {
        $this->authorize('delete', $problem);

        $problem->delete();

        return redirect()
            ->route('problems.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
