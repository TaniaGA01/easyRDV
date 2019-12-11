<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CompletedPersonalInformation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        // dd($user);
        $id = $user->id;
        $role_id = $user->role_id;

        if(($role_id == 3) && ($user->last_name != null && $user->first_name != null && $user->phone_number != null)){
            return $next($request);
            // return view('clientArea.index', ['id' => $id]);
        }elseif(($role_id == 2) && ($user->last_name != null && $user->first_name != null && $user->phone_number != null && $user->adresse && $user->city_id)){
            return $next($request);
            // return view('professionnelArea.indexAgenda', ['id' => $id]);
        }else{
            $request->session()->flash('status',"Vous devez remplir les champs obligatoires");
            $request->session()->flash('alert-class',"alert-danger");
            return redirect()->action('UserInfoController@create');
        }
        abort(403);
    }
}
