<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlyerColorFlyerLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyer_color_flyer_label', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flyer_color_id')->unsigned();
            $table->foreign('flyer_color_id')->references('id')->on('flyer_colors')->onDelete('cascade');
            $table->integer('flyer_label_id')->unsigned();
            $table->foreign('flyer_label_id')->references('id')->on('flyer_labels')->onDelete('cascade');
            $table->string('color');

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
        Schema::dropIfExists('flyer_color_flyer_label');
    }
}
