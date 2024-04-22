<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->integer('baths');
            $table->integer('beds');
            $table->integer('garades');
            $table->integer('garade_size');
            $table->integer('area_size');
            $table->string('yearbuilt');
            $table->integer('annonce_id');
            $table->foreign('annonce_id')
                  ->references('annonce')
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
        Schema::dropIfExists('details');
    }
}
