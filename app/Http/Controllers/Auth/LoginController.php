<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LDAPHelper;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  //  use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request, LDAPHelper $ldapHelper)
    {
      
        //return Redirect::back()->withErrors(['msg' => 'Not Working']);
        // $ldapconn = ldap_connect('ldapmaster.ju.edu.et', 389);
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
       
        $auth = $ldapHelper->authenticate($credentials);  
        
        if ($auth) {
            $this->authenticated($auth);
           
            Auth::login($auth);
            session()->regenerate();
            return redirect('/dashboard');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Invalid Credentials']);
        }
    }
    public function authenticated($user){
        $defaultRole = Role::where('name', 'customer')->first();
    //   dd($user);
        if($user->roles()->first() == null){

           $user->assignRole('customer');
        }

        $exists = Customer::where('full_name',$user->full_name)->exists();
        $customer = new Customer();
        if(!$exists){
         Customer::create([
             'full_name'=> $user->full_name,
             'email' => $user->email,
           
         ]);
        }
        else{
            $customer->full_name =  $user->full_name;
            $customer->email = $user->email;
            $customer->update();
        }
      

    }
   

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

}
