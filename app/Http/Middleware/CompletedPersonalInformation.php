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
        $id = $user->id;
        $r_id = $user->role_id;
        if($user->last_name == null){
            return redirect()->action('UserInfoController@create');
        }
        
        
        return $next($request);
    }
}
