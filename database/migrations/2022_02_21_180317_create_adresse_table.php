<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdresseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresse', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('state')->nullable('true');
            $table->string('country');
            $table->integer('zip')->nullable('true');
            $table->string('quartier');
            $table->string('adresse');
            $table->string('longmap');
            $table->string('latmap');
            $table->string('longview');
            $table->string('latview');
            $table->integer('annonce_id');
            $table->foreign('annonce_id')
                  ->references('id')
                  ->on('annonce')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('adresse');
    }
}
