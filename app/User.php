<?php

namespace furbook;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function owns(Cat $cat){
        return $this->id == $cat->user_id;
    }
    public  function  canEdit(Cat $cat){
        return $this->is_admin || $this->owns($cat);
    }
    public  function  isAdministrator(){
        return $this->getAttributes('is_admin');
    }
}
