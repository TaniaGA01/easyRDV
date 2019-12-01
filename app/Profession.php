<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasMany('App\User');
    }

}
