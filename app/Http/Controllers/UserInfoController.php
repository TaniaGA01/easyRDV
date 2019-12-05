<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
Use Auth;

class UserInfoController extends Controller
{
    public function  create(){

        return view('/userInformations.form');

    }

    public function store(Request $request){

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $r = $request->name;
        $city = City::where('name','=',$r)->get();

        dd($city,$request->city);

        $this->validate($request,[
            'first_name' => 'bail|required',
            'last_name' => 'bail|required',
            'phone_number' => 'bail|required',
            'city' => 'bail|required',
            'adresse' => 'bail|required',
            'about' => 'bail|required',
        ]);

        $user->fill([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'adresse' => $request->adresse,
            'about' => $request->about
        ]);

        return view ();


    }
}
