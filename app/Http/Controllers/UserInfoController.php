<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
Use Auth;

class UserInfoController extends Controller
{
    public function  create(){
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $r_id = $user->role_id;
        $cities = City::all();
        return view('/userInformations.form',['role_id' => $r_id,  'cities' => $cities]);
    }

    public function store(Request $request){

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $r = $request->name;
        $formCity = City::all();

        $this->validate($request,[
            'first_name' => 'bail|required',
            'last_name' => 'bail|required',
            'phone_number' => 'bail|required',
            'city' => 'bail',
            'adresse' => 'bail|required',
            'about' => 'bail',
        ]);

        $user->fill([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'city' => '',
            'adresse' => $request->adresse,
            'about' => ''
        ]);

        $user->save();

        return view ('/home');
    }
}
