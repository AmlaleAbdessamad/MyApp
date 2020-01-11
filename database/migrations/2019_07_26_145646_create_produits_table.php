<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_produit')->unique();
            $table->string('nom_produit')->unique();
            $table->text('designation_produit')->nullable();
            $table->integer('quantite_produit');
            $table->double('prix_ht_achat');
            $table->double('prix_ht_vente');
            $table->double('taux_tva');
            $table->unsignedBigInteger('groupe_id')->index();
            $table->foreign('groupe_id')->references('id')->on('groupeproduits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
