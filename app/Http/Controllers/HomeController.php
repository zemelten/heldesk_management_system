<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\UserSupport;
use Illuminate\Http\Request;
use Database\Seeders\UserSupportSeeder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index()
    {
        //conut all users 
        $countUsers = User::count();
        $totalTicket = Ticket::count();
        $countUsersupports = UserSupport::count();
        $totalactiveTicket = Ticket::where('status', '=', 1)->count();
        $totalpendingTicket = Ticket::where('status', '=', 2)->count();
        $totalClosedTicket = Ticket::where('status', '=', 3)->count();
        $todaysClosedTicket = Ticket::whereDate('updated_at', today())->count();
        $todaysTicket = Ticket::whereDate('created_at', today())->count();
        $totalUnclosedTicket = Ticket::where('status', '<', 3)->count();


        //dd($countusers);

        return view('home', compact('countUsers','countUsersupports', 'totalTicket', 'totalactiveTicket', 'totalpendingTicket', 'totalClosedTicket', 'todaysClosedTicket', 'todaysTicket', 'totalUnclosedTicket'));
    }
}
