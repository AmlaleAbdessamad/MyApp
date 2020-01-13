<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    //
    protected $guarded = ['adresse_id'];
    
    public function adresseable(){
        return $this->morphTo();
    }
}
