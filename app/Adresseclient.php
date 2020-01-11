<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresseclient extends Model
{
    protected $guarded = ['adresse_id'];
    
    public function client(){
        return $this->belongsto('App\Client');
    }
}
