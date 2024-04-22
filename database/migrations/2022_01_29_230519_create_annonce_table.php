<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            //for sale 0 ___ for rent 1
            $table->integer('status');
            //1 for enabled ___ 0 for the opposite
            $table->integer('enabled');
            $table->float('price');
            $table->float('price_month');
            $table->float('price_sqft');
            //0 not sold ___ 1 sold
            $table->float('is_sold');
            $table->text('description');
            $table->float('size');
            $table->string('video');
            $table->integer('type_id');
            $table->integer('users_id');
            $table->foreign('type_id')
                  ->references('id')
                  ->on('type')
                  ->onDelete('cascade');
            $table->foreign('users_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('annonce');
    }
}
