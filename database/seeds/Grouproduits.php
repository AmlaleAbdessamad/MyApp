<?php

use App\Groupeproduit;
use Illuminate\Database\Seeder;

class Grouproduits extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arraydata=['Bio','Cosmetics','Alimentaire'];
        foreach($arraydata as $element){
            Groupeproduit::create([
                'nom'=> $element,
            ]);
        }
        
    }
}