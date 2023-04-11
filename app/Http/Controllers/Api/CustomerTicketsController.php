<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Http\Resources\TicketCollection;

class CustomerTicketsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Customer $customer)
    {
        $this->authorize('view', $customer);

        $search = $request->get('search', '');

        $tickets = $customer
            ->tickets()
            ->search($search)
            ->latest()
            ->paginate();

        return new TicketCollection($tickets);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $this->authorize('create', Ticket::class);

        $validated = $request->validate([
            'status' => ['nullable', 'max:255'],
            'description' => ['nullable', 'max:255', 'string'],
            'customer_id' => ['nullable', 'exists:users,id'],
            'campuse_id' => ['nullable', 'exists:campuses,id'],
            'building_id' => ['nullable', 'exists:buildings,id'],
            'problem_id' => ['nullable', 'exists:problems,id'],
            'organizational_unit_id' => [
                'nullable',
                'exists:organizational_units,id',
            ],
            'user_support_id' => ['nullable', 'exists:user_supports,id'],
            'prioritie_id' => ['nullable', 'exists:priorities,id'],
        ]);

        $ticket = $customer->tickets()->create($validated);

        return new TicketResource($ticket);
    }
}
