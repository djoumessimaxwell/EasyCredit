<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [ 'UserID', 'Type', 'Amount', 'Date', 'senderId', 'receiverId'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function compte(){
        return $this->belongsTo(Compte::class);
    }
}
