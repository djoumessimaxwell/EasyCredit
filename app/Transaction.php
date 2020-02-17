<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [  'UserID', 'Type','Amount', 'Date'];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
