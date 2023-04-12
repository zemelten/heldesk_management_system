<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Models\QueueType;
use App\Models\UserSupport;
use Livewire\WithPagination;
use App\Models\EscalatedTicket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserSupportEscalatedTicketsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public UserSupport $userSupport;
    public EscalatedTicket $escalatedTicket;
    public $ticketsForSelect = [];
    public $queueTypesForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New EscalatedTicket';

    protected $rules = [
        'escalatedTicket.ticket_id' => ['nullable', 'exists:tickets,id'],
        'escalatedTicket.queue_type_id' => [
            'nullable',
            'exists:queue_types,id',
        ],
    ];

    public function mount(UserSupport $userSupport)
    {
        $this->userSupport = $userSupport;
        $this->ticketsForSelect = Ticket::pluck('description', 'id');
        $this->queueTypesForSelect = QueueType::pluck('queue_name', 'id');
        $this->resetEscalatedTicketData();
    }

    public function resetEscalatedTicketData()
    {
        $this->escalatedTicket = new EscalatedTicket();

        $this->escalatedTicket->ticket_id = null;
        $this->escalatedTicket->queue_type_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newEscalatedTicket()
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.user_support_escalated_tickets.new_title'
        );
        $this->resetEscalatedTicketData();

        $this->showModal();
    }

    public function editEscalatedTicket(EscalatedTicket $escalatedTicket)
    {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.user_support_escalated_tickets.edit_title'
        );
        $this->escalatedTicket = $escalatedTicket;

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

        if (!$this->escalatedTicket->user_support_id) {
            $this->authorize('create', EscalatedTicket::class);

            $this->escalatedTicket->user_support_id = $this->userSupport->id;
        } else {
            $this->authorize('update', $this->escalatedTicket);
        }

        $this->escalatedTicket->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', EscalatedTicket::class);

        EscalatedTicket::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetEscalatedTicketData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->userSupport->escalatedTickets as $escalatedTicket) {
            array_push($this->selected, $escalatedTicket->id);
        }
    }

    public function render()
    {
        return view('livewire.user-support-escalated-tickets-detail', [
            'escalatedTickets' => $this->userSupport
                ->escalatedTickets()
                ->paginate(20),
        ]);
    }
}
