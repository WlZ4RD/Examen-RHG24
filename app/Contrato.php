<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    //
    protected $guarded = ['Estado'];

    public function personal()
    {
        return $this->belongsTo('App\Personal');
    }

}
