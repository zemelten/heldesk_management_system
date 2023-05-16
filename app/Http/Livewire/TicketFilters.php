<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Api\TicketController;
use App\Models\Ticket;
use App\Models\UserSupport;
use Livewire\Component;

class TicketFilters extends Component
{
    public $support;
    public function render()
    {
        $userSupports = UserSupport::withCount('tickets')->orderBy('tickets_count','asc')->get();
        $tickets = Ticket::all()
        ->when($this->support, function($query, $support){
            return $query->where('user_support_id',$support);
        });
        $this->emit('ticketsFiltered', $tickets);

        $obj = new TicketController();
        $obj->$tickets = $tickets;
      
       
        return view('livewire.ticket-filters', compact('userSupports'));
    }
}
