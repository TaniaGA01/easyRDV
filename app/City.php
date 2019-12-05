<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name_ville', 'postal_code'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
