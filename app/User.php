<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

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
        'name', 'aPaterno','aMaterno','dni','direccion','nCelular','fIngreso','avatar','user','ultimoLogeo','email', 'cargos_id','password','users_id',
    ];

    public function cargo()
    {
        return $this->belongsTo(cargos::class,'cargos_id');
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

    public function nombreUsuario()
    {
        $nombreauth = Auth::user()->name;
        $nombrearray = explode(' ',$nombreauth);
        $nombre = $nombrearray[0];
        $apellido = Auth::user()->aPaterno;
        $nombreUser = $nombre.' '.$apellido;

        return $nombreUser;
    }




}
