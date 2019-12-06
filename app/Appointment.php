<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'data_tartempion',
        'content'
    ];

    public function id_pro()
    {
        return $this->belongsTo('App\User');
    }

    public function id_client()
    {
        return $this->belongsTo('App\User');
    }

}
