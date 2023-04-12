<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProblemCatagory;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProblemResource;
use App\Http\Resources\ProblemCollection;

class ProblemCatagoryProblemsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemCatagory $problemCatagory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ProblemCatagory $problemCatagory)
    {
        $this->authorize('view', $problemCatagory);

        $search = $request->get('search', '');

        $problems = $problemCatagory
            ->problems()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProblemCollection($problems);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemCatagory $problemCatagory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProblemCatagory $problemCatagory)
    {
        $this->authorize('create', Problem::class);

        $validated = $request->validate([
            'name' => ['nullable', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
        ]);

        $problem = $problemCatagory->problems()->create($validated);

        return new ProblemResource($problem);
    }
}
