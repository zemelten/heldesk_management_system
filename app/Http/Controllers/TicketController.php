<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Campus;
use App\Models\Problem;
use App\Models\Customer;
use App\Models\Prioritie;
use App\Models\UserSupport;
use Illuminate\Http\Request;
use App\Models\OrganizationalUnit;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;

class TicketController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Ticket::class);

        $search = $request->get('search', '');

        $tickets = Ticket::search($search)
        
            ->latest()
            ->paginate(5)
            ->withQueryString();
           

        return view('app.tickets.index', compact('tickets', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Ticket::class);

        $campuses = Campus::pluck('name', 'id');
        $customers = Customer::pluck('full_name', 'id');
        $problems = Problem::pluck('name', 'id');
        $organizationalUnits = OrganizationalUnit::pluck('name', 'id');
        $userSupports = UserSupport::pluck('id', 'id');
        $priorities = Prioritie::pluck('name', 'id');

        return view(
            'app.tickets.create',
            compact(
                'campuses',
                'customers',
                'problems',
                'organizationalUnits',
                'userSupports',
                'priorities'
            )
        );
    }

    /**
     * @param \App\Http\Requests\TicketStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStoreRequest $request)
    {
        $this->authorize('create', Ticket::class);

        $validated = $request->validated();

        $ticket = Ticket::create($validated);

        return redirect()
            ->route('tickets.edit', $ticket)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        return view('app.tickets.show', compact('ticket'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $campuses = Campus::pluck('name', 'id');
        $customers = Customer::pluck('full_name', 'id');
        $problems = Problem::pluck('name', 'id');
        $organizationalUnits = OrganizationalUnit::pluck('name', 'id');
        $userSupports = UserSupport::pluck('id', 'id');
        $priorities = Prioritie::pluck('name', 'id');

        return view(
            'app.tickets.edit',
            compact(
                'ticket',
                'campuses',
                'customers',
                'problems',
                'organizationalUnits',
                'userSupports',
                'priorities'
            )
        );
    }

    /**
     * @param \App\Http\Requests\TicketUpdateRequest $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $validated = $request->validated();

        $ticket->update($validated);

        return redirect()
            ->route('tickets.edit', $ticket)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Ticket $ticket)
    {
        $this->authorize('delete', $ticket);

        $ticket->delete();

        return redirect()
            ->route('tickets.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
