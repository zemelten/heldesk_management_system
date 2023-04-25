<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUpdater
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $isEdited = Customer::where('full_name',Auth::user()->full_name)->first()->is_edited;
       
        if($isEdited === 0){
            return redirect('/updateprofile')->with('message','Please Update Your Information first!');
        }
        return $next($request);
    }
}
