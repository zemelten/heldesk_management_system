<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        // $customer = new Customer();
        // $exists = Customer::where('user_id',Auth::user()->full_name)->exists();
        // $c = Customer::where('user_id',Auth::user()->full_name)->first();
        
        // if(!$exists){

        // $customer->create([
        //     'full_name'=>Auth::user()->full_name,
        //     'email'=>Auth::user()->email
        // ]);
        // } 
        // $isEdited = $c->is_edited;
        
        //conut all users 
        $countUsers = User::count();
        $totalTicket = Ticket::count();
        $totalactiveTicket = Ticket::where('status', '=', 1)->count();
        $totalpendingTicket = Ticket::where('status', '=', 2)->count();
        $totalClosedTicket = Ticket::where('status', '=', 3)->count();
        $todaysClosedTicket = Ticket::whereDate('updated_at', today())->count();
        $todaysTicket = Ticket::whereDate('created_at', today())->count();


        //dd($countusers);

        return view('home', compact('countUsers', 'totalTicket', 'totalactiveTicket', 'totalpendingTicket', 'totalClosedTicket', 'todaysClosedTicket', 'todaysTicket'));
    }
}
