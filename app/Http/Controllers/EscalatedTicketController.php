<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\QueueType;
use App\Models\UserSupport;
use Illuminate\Http\Request;
use App\Models\EscalatedTicket;
use App\Http\Requests\EscalatedTicketStoreRequest;
use App\Http\Requests\EscalatedTicketUpdateRequest;

class EscalatedTicketController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EscalatedTicket::class);

        $search = $request->get('search', '');

        $escalatedTickets = EscalatedTicket::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.escalated_tickets.index',
            compact('escalatedTickets', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', EscalatedTicket::class);

        $tickets = Ticket::pluck('description', 'id');
        $userSupports = UserSupport::pluck('id', 'id');
        $queueTypes = QueueType::pluck('queue_name', 'id');

        return view(
            'app.escalated_tickets.create',
            compact('tickets', 'userSupports', 'queueTypes')
        );
    }

    /**
     * @param \App\Http\Requests\EscalatedTicketStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscalatedTicketStoreRequest $request)
    {
        $this->authorize('create', EscalatedTicket::class);

        $validated = $request->validated();

        $escalatedTicket = EscalatedTicket::create($validated);

        return redirect()
            ->route('escalated-tickets.edit', $escalatedTicket)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EscalatedTicket $escalatedTicket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EscalatedTicket $escalatedTicket)
    {
        $this->authorize('view', $escalatedTicket);

        return view('app.escalated_tickets.show', compact('escalatedTicket'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EscalatedTicket $escalatedTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, EscalatedTicket $escalatedTicket)
    {
        $this->authorize('update', $escalatedTicket);

        $tickets = Ticket::pluck('description', 'id');
        $userSupports = UserSupport::pluck('id', 'id');
        $queueTypes = QueueType::pluck('queue_name', 'id');

        return view(
            'app.escalated_tickets.edit',
            compact('escalatedTicket', 'tickets', 'userSupports', 'queueTypes')
        );
    }

    /**
     * @param \App\Http\Requests\EscalatedTicketUpdateRequest $request
     * @param \App\Models\EscalatedTicket $escalatedTicket
     * @return \Illuminate\Http\Response
     */
    public function update(
        EscalatedTicketUpdateRequest $request,
        EscalatedTicket $escalatedTicket
    ) {
        $this->authorize('update', $escalatedTicket);

        $validated = $request->validated();

        $escalatedTicket->update($validated);

        return redirect()
            ->route('escalated-tickets.edit', $escalatedTicket)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EscalatedTicket $escalatedTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EscalatedTicket $escalatedTicket)
    {
        $this->authorize('delete', $escalatedTicket);

        $escalatedTicket->delete();

        return redirect()
            ->route('escalated-tickets.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
