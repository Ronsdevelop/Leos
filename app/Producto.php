<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetallePedido;

class Producto extends Model
{
 public function Pedidos( )
 {
     return $this->belongsToMany('App\Pedido');
 }
}
