<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Campus;
use App\Models\Customer;
use App\Models\OrganizationalUnit;
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
        
        $customer = new Customer();
        $exists = Customer::where('full_name',Auth::user()->full_name)->exists();
        $c = Customer::where('full_name',Auth::user()->full_name)->first();
        $campus = Campus::all();
        $buildings = Building::all();
        $organizationalUnits = OrganizationalUnit::all();
        
        if(!$exists){

        $customer->create([
            'full_name'=>Auth::user()->full_name,
            'email'=>Auth::user()->email
        ]);
        } 
        return view('home',[
            'isEdited'=>$c->is_edited,
            'campus'=>$campus,
            'organizationalUnits'=>$organizationalUnits,
            'buildings'=>$buildings
        ]);
    }
}
