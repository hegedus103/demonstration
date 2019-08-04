<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllatokMarhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allatok_marhas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('enarszam',10);
            $table->string('neve',255);
            $table->string('neme',100);
            $table->date('szuletes_datuma');
            $table->date('bekerult');
            $table->string('fajta',255);
            $table->string('szine',255);
            $table->string('anya_enarszam',10);
            $table->string('anya_neve',255);
            $table->string('jarlat_sorszam',100);
            $table->date('jarlat_kiadasa');
            $table->string('szarmazas_tenyeszet',255);
            $table->boolean('kikerules');
            $table->date('kikerules_datuma');
            $table->string('kikerules_helye',255);
            $table->string('cel_tenyeszet',255);
            $table->boolean('elhullas');
            $table->date('elhullas_datuma');
            $table->boolean('sajat_vagas');
            $table->date('sajat_vagas_datuma');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('allatok_marhas');
    }
}
