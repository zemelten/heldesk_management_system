<?php

namespace App\Http\Controllers\Api;

use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerCollection;

class FloorCustomersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Floor $floor)
    {
        $this->authorize('view', $floor);

        $search = $request->get('search', '');

        $customers = $floor
            ->customers()
            ->search($search)
            ->latest()
            ->paginate();

        return new CustomerCollection($customers);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Floor $floor)
    {
        $this->authorize('create', Customer::class);

        $validated = $request->validate([
            'full_name' => ['nullable', 'max:255', 'string'],
            'email' => ['nullable', 'email'],
            'phone_number' => ['nullable', 'max:255', 'string'],
            'building_id' => ['nullable', 'exists:buildings,id'],
            'campus_id' => ['nullable', 'exists:campuses,id'],
            'organizational_unit_id' => [
                'nullable',
                'exists:organizational_units,id',
            ],
            'user_id' => ['nullable', 'exists:users,id'],
            'is_edited' => ['nullable', 'max:255'],
            'office_num' => ['nullable', 'max:255', 'string'],
        ]);

        $customer = $floor->customers()->create($validated);

        return new CustomerResource($customer);
    }
}
