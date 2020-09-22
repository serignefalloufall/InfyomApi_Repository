<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('clients_id')->unsigned();
            $table->foreign('clients_id')->references('id')->on('clients');

            $table->integer('typecomptes_id')->unsigned();
            $table->foreign('typecomptes_id')->references('id')->on('typecomptes');

            $table->string('num_compte');
            $table->string('cle_rip');
            $table->decimal('frais_ouverture',6,2);
            $table->double('agio',6,2);
            $table->string('date_ouverture');
            $table->string('date_fermuture');
          
            $table->timestamp('deleted_at');
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
        Schema::dropIfExists('comptes');
    }
}
