<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable = ['UserId','Client-entId', 'Solde', 'Account_number', 'ProductId'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function client_ent(){
        return $this->belongsTo(Client_ent::class);
    }

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}
