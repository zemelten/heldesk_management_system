<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\UpdateProfileStoreRequest;
use App\Models\Building;
use App\Models\Campus;
use App\Models\Customer;
use App\Models\OrganizationalUnit;
use App\Models\UpdateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $campuses = Campus::pluck('name', 'id');
        $buildings = Building::pluck('name', 'id');
        $organizationalUnits = OrganizationalUnit::pluck('name', 'id');
        return view('layouts.profile.update-profile',compact('campuses','buildings','organizationalUnits'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //
        $customer = Customer::where('full_name', Auth::user()->full_name)->first();
        // $messages = [
        //     'phone_no.regex' => 'The phone number format is invalid.'
        // ];
        // $validated = $this->validate($request,[
        //     'phone_no'=>'regex:/(^(\07|09)\d{3})-?\d{6}$/',
            
        //  ],$messages);
        // $messages = [
        //     'phone.regex' => 'The phone number format is invalid.'
        // ];
        
        $phone_no = $request->validate([
            'phone_no' =>  ['required', 'regex:/^(\0)9|7[0-9]{8}/',
             Rule::unique('customers')->where(function ($query) {
                return $query->where('phone_no', request('phone_no'));
            })]
        ]);
      
       
         $customer->email = $request->email;
         $customer->phone_no =    $phone_no['phone_no'];
         $customer->is_edited = 1;
         $customer->building_id = $request->building_id;
         $customer->campus_id = $request->campuse_id;
         $customer->organizational_unit_id = $request->organizational_unit_id;
         $customer->floor_id = $request->floor_id;
         $customer->office_num = $request->office_num;
         $customer->update();
         return redirect()
             ->route('tickets.index')
             ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updateProfile(){
          }
}
