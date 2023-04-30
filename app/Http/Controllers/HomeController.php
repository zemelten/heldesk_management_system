<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Campus;
use App\Models\Customer;
use App\Models\OrganizationalUnit;
use App\Models\User;
use App\Models\Ticket;
use App\Models\UserSupport;
use Illuminate\Http\Request;
use Database\Seeders\UserSupportSeeder;
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
      
       if(Auth::user()->roles()->first()->name == null){
        Auth::user()->assignRole('user');
       }
       dd(Auth::user()->email);
        $countUsers = User::count();
        $totalTicket = Ticket::count();
        $countUsersupports = UserSupport::count();
        $totalactiveTicket = Ticket::where('status', '=', 0)->count();
        $totalpendingTicket = Ticket::where('status', '=', 2)->count();
        $totalClosedTicket = Ticket::where('status', '=', 3)->count();
        $todaysClosedTicket = Ticket::whereDate('updated_at', today())->count();
        $todaysTicket = Ticket::whereDate('created_at', today())->count();
        $totalUnclosedTicket = Ticket::where('status', '<', 3)->count();
         $exists = Customer::where('full_name',Auth::user()->full_name)->exists();
       if(!$exists){
        Customer::create([
            'full_name'=>Auth::user()->full_name,
            'email'=>Auth::user()->email
        ]);
       }
    if(Auth::user()->roles()->first() !=null){
        
        if(Auth::user()->roles()->first()->name === "User Support"){
            $user_support = UserSupport::where('user_id',Auth::user()->id)->first()->id;
            $userSupport = UserSupport::find($user_support);
            return view('home', compact('countUsers', 'totalTicket', 'totalactiveTicket','userSupport', 'countUsersupports','totalpendingTicket', 'totalClosedTicket', 'todaysClosedTicket', 'todaysTicket', 'totalUnclosedTicket'));
        }
    }
        


      
        



        //dd($countusers);

        return view('home', compact('countUsers', 'totalTicket', 'totalactiveTicket', 'countUsersupports','totalpendingTicket', 'totalClosedTicket', 'todaysClosedTicket', 'todaysTicket', 'totalUnclosedTicket'));
    }
}
