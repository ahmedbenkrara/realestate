<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable('true');
            $table->float('size')->nullable('true');
            $table->integer('baths')->nullable('true');
            $table->integer('beds')->nullable('true');
            $table->float('price')->nullable('true');
            $table->text('description')->nullable('true');
            $table->string('image')->nullable('true');
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
        Schema::dropIfExists('floors');
    }
}
