<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre_razon','direccion','documento_identi','alias','representante','email','nCelular','cumpleanos','referencia','tipoCliente_id','identificacion_id','users_id'];

    public function Pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
