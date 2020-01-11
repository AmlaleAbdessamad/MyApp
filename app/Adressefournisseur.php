<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adressefournisseur extends Model
{
    //
    protected $guarded = ['adresse_id'];
    
    public function fournisseur(){
        return $this->belongsto('App\Fournisseur');
    }
}
