<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($id){
        $user = Auth::user();
        $id = $user->id;
        $r_id = $user->role_id;

        if($r_id == 2){
            return redirect()->action('ProfessionalAreaController@indexAgenda',['id' => $id]);
        }elseif($r_id == 3){
            return redirect()->action('ClientAreaController@index',['id' => $id]);
        }else{
            return view('welcome');
        }
    }
}
