<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [ 'Name', 'Number', 'Solde' ];

    public function compte(){
        return $this->hasOne(Compte::class);
    }
}
