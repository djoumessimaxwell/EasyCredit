<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client_Ent extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Raison_sociale', 'Forme_juridique', 'email','phone', 'password', 'is_deleted', 'Numero_contribuable', 
        'NC_date', 'Siege','Activité','SiteWeb'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function compte(){
        return $this->hasOne(Compte::class);
    }

    public function guichets(){
        return $this->belongsToMany('App\Guichet', 'user_guichet', 'Client_entId', 'GuichetId');
    }

    public function hasAnyGuichet($guichets) {
        if (is_array($guichets)) {
            foreach($guichets as $guichet) {
                if ($this->hasGuichet($guichet)){
                    return true;
                }
            }
        } else {
            if ($this->hasGuichet($guichets)) {
                return true;
            }
        }
        return false;
    }

    public function hasGuichet($guichet) {
        if ($this->guichets()->where('name',$guichet)->first()){
            return true;
        }
        return false;
    }

    public function roles(){
        return $this->belongsToMany('App\Role', 'user_role', 'client_entId', 'role_id');
    }

    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach($roles as $role) {
                if ($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }


    public function hasRole($role) {
        if ($this->roles()->where('name',$role)->first()){
            return true;
        }
        return false;
    }

    public function getFullnameAttribute(){
        return "{$this->firstname} {$this->lastname}";
    }
}
