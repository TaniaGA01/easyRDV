<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        if($role_id == 3){
            return $next($request);
        }else{
            $request->session()->flash('icon',"fas fa-exclamation-triangle");
            $request->session()->flash('status',"Vous devez creer un compte Client pour pouvoir prendre rendez-vous");
            $request->session()->flash('alert-class',"alert-danger");
            return back();
        }
    }
}
