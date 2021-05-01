<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable_ent extends Model
{
    protected $fillable = ['client-entId', "firstname", "lastname", "phone", "email", "CNI_number","CNI_date", "CNI_place", "poste"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'CNI_date' => 'datetime',
    ];

    public function client_ent(){
        return $this->belongsTo(Client_ent::class);
    }
}
