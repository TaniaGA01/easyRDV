<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data,
        [
            // 'name' => ['required', 'string', 'max:255'],
            'email_register' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password_register' => ['required', 'string', 'min:6', 'confirmed'],
            'cgu_register' => ['accepted']
        ],
        [
            'accepted'=> 'Les conditions d\'utilisation doivent être acceptées'
        ]);

        $validator->setAttributeNames([
            'email_register' => 'email',
            'password_register' => 'password'
        ]);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $roleId = 3;
        if(in_array('professional',$data)){
            $roleId = 2;
        }

        return User::create([
            // 'name' => $data['name'],
            'email' => $data['email_register'],
            'password' => Hash::make($data['password_register']),
            'role_id' => $roleId
        ]);
    }
}
