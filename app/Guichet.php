<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guichet extends Model
{
    protected $fillable = [ 'Name', 'Number', 'UserId', 'MarchandId' ];
}
