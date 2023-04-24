<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\QueueType;
use App\Models\UserSupport;
use Illuminate\Http\Request;
use App\Models\EscalatedTicket;
use App\Http\Requests\EscalatedTicketStoreRequest;
use App\Http\Requests\EscalatedTicketUpdateRequest;
use App\Models\Customer;
use App\Models\ProblemCatagory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $customer_id = Customer::where('full_name', Auth::user()->full_name)->first()->id;
        $esc = EscalatedTicket::first();
       // dd(Ticket::find($esc->ticket_id)->customer_id);
      //  App\Models\Ticket::find($escalatedTicket->id)->customer_id

      
         //Escalated Tickets
         $escalated_tickets = Ticket::where('status',2)->get();
         
         //////////////////

        $escalatedTickets = EscalatedTicket::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();
//dd($escalatedTickets);
        return view(
            'app.escalated_tickets.index',
            compact('escalatedTickets', 'search','customer_id')
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
        $userSupports =  UserSupport::all();
      
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
        $userSupports = UserSupport::pluck('user_id', 'id');
        $queueTypes = QueueType::pluck('queue_name', 'id');
        //get queue type from escalated ticket
       // dd($escalatedTicket->userSupport->user->id);
        $queue = $escalatedTicket->queue_type_id;
        $escalated_by = $escalatedTicket->userSupport->user->id;
        $escalated_by_name = $escalatedTicket->userSupport->user->full_name;
        //dd($queue);
        $user_sup = ProblemCatagory::where('queue_type_id',$queue)->get();

      //  dd($user_sup);

        foreach($user_sup as $support=>$userSupports){
            // dd($userSupports->queueType->queue_name);
         foreach($userSupports->userSupports as $user){
           // dd($user->id);
         }
        }

        return view(
            'app.escalated_tickets.edit',
            compact('escalatedTicket', 'tickets', 'escalated_by_name', 'userSupports','escalated_by', 'user_sup', 'queueTypes')
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
        //dd($request->user_support_id);
     
     
        $this->authorize('update', $escalatedTicket);
        $ticket = Ticket::find($escalatedTicket->ticket_id);
     //dd($ticket);
     $ticket->status = 0;
     $ticket->description = $ticket->description;
     $ticket->campuse_id = $ticket->campuse_id;
     $ticket->customer_id = $ticket->customer_id;
     $ticket->problem_id = $ticket->problem_id;
     $ticket->organizational_unit_id = $ticket->organizational_unit_id;
     $ticket->reports_id = $ticket->reports_id;
     $ticket->user_support_id = intval($request->user_support_id);
     $ticket->prioritie_id = $ticket->prioritie_id;
     $ticket->created_at = now();
     $ticket->updated_at = now();
     $ticket->update();

    
       // $validated = $request->validated();

       // $escalatedTicket->update($validated);

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
