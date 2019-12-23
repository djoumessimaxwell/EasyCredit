<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [ 'Numero','DateReservation', 'vol_id', 'Passager'];

    public function vols(){
        return $this->belongsTo(Vols::Class);
    }
}
