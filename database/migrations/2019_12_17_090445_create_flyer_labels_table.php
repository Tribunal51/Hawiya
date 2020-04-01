<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlyerLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyer_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flyer_id')->unsigned();
            $table->foreign('flyer_id')->references('id')->on('flyers')->onDelete('cascade');
            $table->float('x1');
            $table->float('y1');
            $table->float('x2');
            $table->float('y2');
            $table->string('font_name');
            $table->string('font_weight')->nullable();
            $table->double('font_size');
            $table->boolean('backside')->default(false);
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
        Schema::dropIfExists('flyer_labels');
    }
}
