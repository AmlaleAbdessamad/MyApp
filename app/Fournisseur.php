<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    //

    //
    protected $guarded=[];
    
    // public function contacts(){
    //     return $this->hasMany('App\Contactfournisseur')->oldest();;
    // }

    // public function adresses(){
    //     return $this->hasMany('App\Adressefournisseur')->oldest();;
    // }

    public function contacts(){
        return $this->morphMany('App\Contact','contactable');
    }
    public function adresses(){
        return $this->morphMany('App\Adresse','adresseable');
    }
}
