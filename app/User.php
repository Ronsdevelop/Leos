<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

use  App\cargos;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cargos_id','avatar','user','direccion','fIngreso','nCelular','dni','users_id','ultimoLogeo'
    ];

    public function cargo()
    {
        return $this->belongsTo('App\cargos');
    }

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

    public function adminlte_image()
    {
        $img = Auth::user()->avatar;
        return $img;

    }

    public function adminlte_desc()
    {
        $id = Auth::user()->cargos_id;

        $cargo = cargos::find($id);


        return $cargo['cargo'];


    }
    public function setAvatar($foto)
    {

    }




}
