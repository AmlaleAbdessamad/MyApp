<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactclient extends Model
{
    //
    protected $guarded=['contact_id'];

    public function client(){
        return $this->belongsto('App\Client');
    }
}
