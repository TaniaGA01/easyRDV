<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'email','phone',
        'content'
    ];
}
