<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use App\Models\Campus;
use Livewire\Component;
use App\Models\Problem;
use App\Models\Customer;
use App\Models\Prioritie;
use App\Models\UserSupport;
use Livewire\WithPagination;
use App\Models\OrganizationalUnit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerTicketsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Customer $customer;
    public Ticket $ticket;
    public $campusesForSelect = [];
    public $problemsForSelect = [];
    public $organizationalUnitsForSelect = [];
    public $userSupportsForSelect = [];
    public $prioritiesForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Ticket';

    protected $rules = [
        'ticket.status' => ['nullable', 'max:255'],
        'ticket.description' => ['nullable', 'max:255', 'string'],
        'ticket.campuse_id' => ['nullable', 'exists:campuses,id'],
        'ticket.problem_id' => ['nullable', 'exists:problems,id'],
        'ticket.organizational_unit_id' => [
            'nullable',
            'exists:organizational_units,id',
        ],
        'ticket.user_support_id' => ['nullable', 'exists:user_supports,id'],
        'ticket.prioritie_id' => ['nullable', 'exists:priorities,id'],
    ];

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->campusesForSelect = Campus::pluck('name', 'id');
        $this->problemsForSelect = Problem::pluck('name', 'id');
        $this->organizationalUnitsForSelect = OrganizationalUnit::pluck(
            'name',
            'id'
        );
        $this->userSupportsForSelect = UserSupport::pluck('user_id', 'id');
        $this->prioritiesForSelect = Prioritie::pluck('name', 'id');
        $this->resetTicketData();
    }

    public function resetTicketData()
    {
        $this->ticket = new Ticket();

        $this->ticket->campuse_id = null;
        $this->ticket->problem_id = null;
        $this->ticket->organizational_unit_id = null;
        $this->ticket->user_support_id = null;
        $this->ticket->prioritie_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newTicket()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.customer_tickets.new_title');
        $this->resetTicketData();

        $this->showModal();
    }

    public function editTicket(Ticket $ticket)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.customer_tickets.edit_title');
        $this->ticket = $ticket;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal()
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal()
    {
        $this->showingModal = false;
    }

    public function save()
    {
        $this->validate();

        if (!$this->ticket->customer_id) {
            $this->authorize('create', Ticket::class);

            $this->ticket->customer_id = $this->customer->id;
        } else {
            $this->authorize('update', $this->ticket);
        }

        $this->ticket->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', Ticket::class);

        Ticket::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetTicketData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->customer->tickets as $ticket) {
            array_push($this->selected, $ticket->id);
        }
    }

    public function render()
    {
        return view('livewire.customer-tickets-detail', [
            'tickets' => $this->customer->tickets()->paginate(20),
        ]);
    }
}
