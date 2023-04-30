<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LDAPHelper;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
       dd($user);
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
