<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded=['contact_id'];
    
    public function contactable(){
        return $this->morphTo();
    }
}
