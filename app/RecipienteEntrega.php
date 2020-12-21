<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipienteEntrega extends Model
{
    public function icono()
    {
        return $this->hasMany('App\RecipienteEntrega');
    }
}
