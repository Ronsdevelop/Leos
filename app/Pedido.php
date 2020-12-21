<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function alias()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
    public function recipiente()
    {
        return $this->belongsTo(RecipienteEntrega::class,'recipiente_id');
    }
    public function TipoEstado()
    {
        return $this->belongsTo(TipoEstado::class,'estado_id');
    }



}
