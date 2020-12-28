<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetallePedido;

class Producto extends Model
{
 public function productoPedido( )
 {
     return $this->hasMany('App\DetallePedido');
 }
}
