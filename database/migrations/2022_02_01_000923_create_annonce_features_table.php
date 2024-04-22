<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_features', function (Blueprint $table) {
            $table->unsignedInteger('annonce_id');
            $table->unsignedInteger('features_id');
            $table->primary(['annonce_id','features_id']);
            $table->foreign('annonce_id')
                  ->references('id')
                  ->on('annonce')
                  ->onDelete('cascade');
            $table->foreign('features_id')
                  ->references('id')
                  ->on('features')
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
        Schema::dropIfExists('annonce_features');
    }
}
