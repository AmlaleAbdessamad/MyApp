<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded=[];
    
    // public function contacts(){
    //     return $this->hasMany('App\Contactclient')->oldest();
    // }

    // public function adresses(){
    //     return $this->hasMany('App\Adresseclient')->oldest();
    // }

    public function contacts(){
        return $this->morphMany('App\Contact','contactable');
    }
    public function adresses(){
        return $this->morphMany('App\Adresse','adresseable');
    }
}
