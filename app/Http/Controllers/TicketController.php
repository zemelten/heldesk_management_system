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
use App\Models\Building;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Ticket::class);

       

        $tickets = Ticket::all();
      
      
        
       
           

        return view('app.tickets.index',compact('tickets'));
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
        $buildings = Building::pluck('name', 'id');
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
                'priorities',
                'buildings',

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
        [
            'status' => ['nullable', 'max:255'],
            'description' => ['nullable', 'max:255', 'string'],
            'campuse_id' => ['nullable', 'exists:campuses,id'],
            'customer_id' => ['nullable', 'exists:customers,id'],
            'problem_id' => ['nullable', 'exists:problems,id'],
            'organizational_unit_id' => [
                'nullable',
                'exists:organizational_units,id',
            ],
            'user_support_id' => ['nullable', 'exists:user_supports,id'],
            'prioritie_id' => ['nullable', 'exists:priorities,id'],
        ];
        $ticket = new Ticket();
        $ticket->status = 37;
        $ticket->description = $request->description;
        $ticket->customer_id = 11;
        $ticket->user_support_id = 11;
        $ticket->reports_id = 1;
        $ticket->campuse_id = $request->campuse_id;
        $ticket->organizational_unit_id = $request->organizational_unit_id;
        $ticket->problem_id = $request->problem_id;   
        $ticket->save();

    if($ticket){
        dd("yes");
    }

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
        $buildings = Building::pluck('name', 'id');
        $organizationalUnits = OrganizationalUnit::pluck('name', 'id');
        $userSupports = UserSupport::pluck('id', 'id');
        $priorities = Prioritie::pluck('name', 'id');

        return view(
            'app.tickets.edit',
            compact(
                'ticket',
                'campuses',
                'customers',
                'buildings',
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
