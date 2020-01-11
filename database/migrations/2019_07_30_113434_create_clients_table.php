<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_client')->unique();
            $table->string('nom_client')->unique();
            $table->string('rc')->nullable();
            $table->string('ice')->nullable();
            $table->string('fixe')->nullable();
            $table->string('fax')->nullable();
            $table->unsignedBigInteger('responsable')->index();
            $table->text('remarques')->nullable();
            $table->string('email')->nullable();
            $table->string('siteweb')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
