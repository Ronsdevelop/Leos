<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  App\User;

class cargos extends Model
{
    protected $table = 'cargos';
    public function usuarios()
    {
        return $this->hasMany('App\User');
    }
}
