<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  App\Producto;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';
    public function nombreProducto()
    {
     return $this->belongsTo('App\Producto');
    }
}
