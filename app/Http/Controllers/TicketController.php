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



        // if (Auth::user()->can) {
        //     $tickets = DB::table('tickets')->get();
        // } else {
        //     $tickets = DB::table('tickets')
        //                 ->join('users', 'users.id', '=', 'tickets.user_id')
        //                 ->where('tickets.status', '=', 'active')
        //                 ->where('users.id', '=', Auth::user()->id)
        //                 ->get();
        // }
        $role = Auth::user()->roles()->first()->name;
        // dd($role);
        if ($role === "super-admin") {
            $tickets = Ticket::all();
        } else {
            // $tickets = Ticket::where('customer_id',$customer_id)->get();
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
        // dd($ticket->first()->userSupport->problemCatagory);
        $campuses = Campus::pluck('name', 'id');
        $customers = Customer::pluck('full_name', 'id');
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
        $prob_cat = ProblemCatagory::find($request->problem_category_id);
        $ticket = new Ticket();
        //dd($prob_cat->userSupports);
        $min = array();
        foreach ($prob_cat->userSupports as $sup) {
            $count_ticket_user_support = Ticket::where('user_support_id', $sup->id)->count();
            array_push($min, $count_ticket_user_support);
        }
        $tickets = Ticket::all();

        $ss = $prob_cat->userSupports->sortBy('tickets')->first()->id;
        $customer_id = Customer::where('full_name', Auth::user()->full_name)->first()->id;
        // dd($customer_id);


        //  $count_ticket_user_support = Ticket::where('user_support_id',$prob_cat->userSupports->first()->id)->count();
        //  dd($count_ticket_user_support);
        //find user support with minu=inum number of tickets

        $ticket->status = 0;
        $ticket->description = $request->description;
        $ticket->customer_id = $customer_id;
        $ticket->user_support_id = $ss;
        $ticket->reports_id = 1;
        $ticket->campuse_id = $request->campuse_id;
        $ticket->organizational_unit_id = $request->organizational_unit_id;
        $ticket->problem_id = $request->problem_id;
        $ticket->save();


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
