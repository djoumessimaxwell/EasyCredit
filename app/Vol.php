<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $fillable = [  'Nom', 'AeroportDépart','AeroportArrivée', 'DateDépart','HeureDépart','DateArrivée','HeureArrivée', 'Escale'];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
