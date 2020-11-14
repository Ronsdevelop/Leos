<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cargos extends Model
{
    public function usuarios()
    {
        return $this->hasMany('App\User');
    }
}
