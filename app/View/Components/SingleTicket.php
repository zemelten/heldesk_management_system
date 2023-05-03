<?php

namespace App\View\Components;

use App\Models\Ticket;
use Illuminate\View\Component;

class SingleTicket extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public $ticketId = 10;
    public function render()
    {

        $ticket = Ticket::where('id', 10)->first();
        //dd($ticket);
        return view('components.single-ticket', ['ticket' => $ticket]);
    }
}
