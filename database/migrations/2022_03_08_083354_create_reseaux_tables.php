<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReseauxTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseaux', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_rappeur');
            $table->string('youtube')->nullable();
            $table->string('spotify')->nullable();
            $table->string('deezer')->nullable();
            $table->string('soundcloud')->nullable();

            $table->foreign('id_rappeur')->references('id')->on('rappeurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reseaux');
    }
}
