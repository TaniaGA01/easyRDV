<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Captcha;
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
    protected $redirectTo = '/email/verify';

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
        if(array_key_exists('professional',$data) && array_key_exists('profession_id',$data)){
            $validator = Validator::make($data,
            [
                'email_register' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password_register' => ['required', 'string', 'min:6', 'confirmed'],
                'cgu_register' => 'accepted',
                'profession_id' => 'integer'

            ],
            [
                'email_register.required' => 'L\'email est obligatoire.',
                'email_register.email' => 'Adresse mail non valide.',
                'email_register.unique' => 'Cette email est déjà utilisée.',

                'password_register.required' => 'Le mot de passe est obligatoire.',
                'password_register.min' => 'Les mots de passe doivent au moins avoir 6 caractères.',
                'password_register.confirmed' => 'Les mots de passe ne correspondent pas.',
                'g-recaptcha-response.required' => new Captcha(),
                'accepted' => 'Les conditions générales d\'utilisation doivent être acceptées',

                'integer' => 'Vous devez selectionner un métier'
            ]);
        }else{
            $validator = Validator::make($data,
            [
                'email_register' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password_register' => ['required', 'string', 'min:6', 'confirmed'],
                'cgu_register' => ['accepted']
            ],
            [
                'email_register.required' => 'L\'email est obligatoire.',
                'email_register.email' => 'Adresse mail non valide.',
                'email_register.unique' => 'Cette e-mail est déjà utilisée.',

                'password_register.required' => 'Le mot de passe est obligatoire.',
                'password_register.min' => 'Les mots de passe doivent au moins avoir 6 caractères.',
                'password_register.confirmed' => 'Les mots de passe ne correspondent pas.',
                'g-recaptcha-response.required' => new Captcha(),
                'accepted'=> 'Les conditions générales d\'utilisation doivent être acceptées',

            ]);
        }



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
        $role_id = 3;
        $profession_id = null;

        if(array_key_exists('professional',$data) && array_key_exists('profession_id',$data)){
            $role_id = 2;
            $profession_id = $data['profession_id'];
        }

        return User::create([
            'email' => $data['email_register'],
            'password' => Hash::make($data['password_register']),
            'role_id' => $role_id,
            'profession_id' => $profession_id
        ]);
    }
}
