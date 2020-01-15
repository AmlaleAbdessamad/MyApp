<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_facture');
            $table->string('num_devis');
            $table->string('num_bon');
            $table->string('montant_text');
            $table->unsignedBigInteger('id_transporteur');
            $table->double('prix_transport');
            $table->unsignedBigInteger('id_client');
            $table->string('traking_number');
            $table->double('poids_total');
            $table->double('tva');
            $table->double('frais_extra');
            $table->double('frais_conditionnement');
            $table->double('total_a_payee');
            $table->unsignedBigInteger('id_devise');
            $table->integer('type');
            $table->date('date_validation');
            $table->text('commentaire');
            $table->text('notes');
            $table->unsignedBigInteger('id_adresse');
            $table->enum('active',["non","oui"]);
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
        Schema::dropIfExists('factures');
    }
}
