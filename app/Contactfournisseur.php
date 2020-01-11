<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactfournisseur extends Model
{
    //
    protected $guarded=['contact_id'];

    public function fournisseur(){
        return $this->belongsto('App\Fournisseur');
    }
}
