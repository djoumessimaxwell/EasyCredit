<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guichet extends Model
{
    public function users () {
        return $this->belongsToMany('App\User', 'user_guichet', 'UserId', 'GuichetId');
    }

    public function client_ent() {
        return $this->belongsToMany('App\Client_ent', 'user_guichet', 'Client_entId', 'GuichetId');
    }
}
