<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users () {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }

    public function client_ent() {
        return $this->belongsToMany('App\Client_ent', 'user_role', 'role_id', 'client_entId');
    }

}
