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
use App\Mail\MailNotify;
use App\Models\Building;
use App\Models\EscalatedTicket;
use App\Models\ProblemCatagory;
use App\Models\QueueType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TicketController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Ticket::class);

        $customer_id = Customer::where('full_name', Auth::user()->full_name)->first()->id;
        $role = Auth::user()->roles()->first()->name;
        if ($role === "super-admin") {
            $tickets = Ticket::all();
        } else {
            $tickets = Ticket::where('customer_id', $customer_id)
                ->where('status', 0)
                ->get();
        }













        return view('app.tickets.index', compact('tickets'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Ticket::class);
        $ticket = new Ticket();
        $campuses = Campus::pluck('name', 'id');
        $customers = Customer::pluck('phone_no', 'id');
        $problems = Problem::pluck('name', 'id');
        $buildings = Building::pluck('name', 'id');
        $organizationalUnits = OrganizationalUnit::pluck('name', 'id');
        $userSupports = UserSupport::pluck('id', 'id');
        $priorities = Prioritie::pluck('name', 'id');
        $problemCategory = ProblemCatagory::pluck('name', 'id');

        return view(
            'app.tickets.create',
            compact(
                'problemCategory',
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

    //function to genrate ticket number 
    function createTicketNumber($prefix)
    {
        $lastTicket = DB::table('tickets')->orderBy('id', 'desc')->first();
        $ticketNumber = $prefix . '/' . sprintf('%05d', intval(substr($lastTicket->ticket_number, -5)) + 1) . '/' . date('y');
        return $ticketNumber;
    }
    /**
     * @param \App\Http\Requests\TicketStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStoreRequest $request)
    {

        $this->authorize('create', Ticket::class); $validated = $request->validated();
        if (Auth::user()->roles()->first()->name == 'super-admin' || Auth::user()->roles()->first()->name == 'helpdesk') {
            $building_id = Customer::where('id', $request->customer_id)->first()->building->id;
            $customer = Customer::where('id', $request->customer_id)->first();
            $userSupportid = UserSupport::where('building_id', $building_id)
                ->where('problem_catagory_id', $request->problem_category_id)
                ->withCount('tickets')
                ->orderBy('tickets_count', 'asc')
                ->first()->id;
        } else {
            $customer = Customer::where('full_name', Auth::user()->full_name)->first();
            $building_id = $customer->building->id;
            $userSupportid = UserSupport::where('building_id', $building_id)
                ->where('problem_catagory_id', 2)
                ->withCount('tickets')
                ->orderBy('tickets_count', 'asc')
                ->first()->id;
        }
        $ticket = new Ticket();
        $ticket->status = 0;
        $ticket->description = $request->description;
        $ticket->customer_id = $customer->id;
        $ticket->user_support_id = $userSupportid;
        $ticket->reports_id = 1;
        $ticket->campuse_id = $customer->campus_id;
        $ticket->organizational_unit_id = $request->organizational_unit_id;
        $ticket->problem_id = $request->problem_id;
        $ticket->save();
        \Mail::to('misafaric@gmail.com')->send(new MailNotify($ticket));
        return redirect()
            ->route('tickets.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Ticket $ticket)
    {
        //dd($this->createTicketNumber('JU'));
        // dd($ticket);
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
        $problemCategory = ProblemCatagory::pluck('name', 'id');
        $campuses = Campus::pluck('name', 'id');
        $customers = Customer::pluck('full_name', 'id');
        $problems = Problem::pluck('name', 'id');
        $buildings = Building::pluck('name', 'id');
        $organizationalUnits = OrganizationalUnit::pluck('name', 'id');
        $userSupports = UserSupport::pluck('id', 'id');
        $priorities = Prioritie::pluck('name', 'id');
        $queue = QueueType::pluck('queue_name', 'id');

        return view(
            'app.tickets.edit',
            compact(
                'queue',
                'problemCategory',
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

        $exists = EscalatedTicket::where('ticket_id', $ticket->id)->exists();
        //    dd($request->status );
        if ($request->status == 2) {

            if (!$exists) {
                EscalatedTicket::create([
                    'ticket_id' => $ticket->id,
                    'user_support_id' => $ticket->user_support_id,
                    'queue_type_id' => $request->queue_type_id
                ]);
            }
        }
        $ticket->update(['status' => $request->status]);
        // dd($ticket);
        return redirect()
            ->route('tickets.index')
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
