<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;

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
        $activeTicket = Ticket::where('status', '=', 1)->count();
        $pendingTicket = Ticket::where('status', '=', 2)->count();


        //dd($countusers);

        return view('home', compact('countUsers', 'totalTicket', 'activeTicket', 'pendingTicket'));
    }
}
