<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
  protected $fillable = ['rason','ruc','direccion','contacto','email','nCelula','nFono','referencia'];
}
