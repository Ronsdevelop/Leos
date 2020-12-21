<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstado extends Model
{
    protected $table = 'tipo_estado';
    public function Pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
