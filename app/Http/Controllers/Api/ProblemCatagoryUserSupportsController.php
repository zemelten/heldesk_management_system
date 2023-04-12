<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProblemCatagory;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserSupportResource;
use App\Http\Resources\UserSupportCollection;

class ProblemCatagoryUserSupportsController extends Controller
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

        $userSupports = $problemCatagory
            ->userSupports()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserSupportCollection($userSupports);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemCatagory $problemCatagory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProblemCatagory $problemCatagory)
    {
        $this->authorize('create', UserSupport::class);

        $validated = $request->validate([
            'user_id' => ['nullable', 'exists:users,id'],
            'user_type' => ['nullable', 'max:255'],
            'building_id' => ['nullable', 'exists:buildings,id'],
            'service_unit_id' => ['required', 'exists:service_units,id'],
            'unit_id' => ['required', 'exists:units,id'],
        ]);

        $userSupport = $problemCatagory->userSupports()->create($validated);

        return new UserSupportResource($userSupport);
    }
}
