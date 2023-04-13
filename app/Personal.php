<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    //
    protected $guarded = ['Estado'];//PROTEGE ESTE CAMPO

    public function contratos()
    {
        return $this->hasMany('App\Contrato');
    }
}
