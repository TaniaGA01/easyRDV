<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\City;

class CityExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //dd($value);
        $city_input = City::where('name_ville',$value)->first();
        if($city_input == null && $value != null){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Cette ville n\'existe pas.';
    }
}
