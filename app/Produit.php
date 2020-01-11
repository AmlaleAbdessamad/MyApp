<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    //
    public function groupe(){
        return $this->belongsTo('App\Groupeproduit');
    }
}
