<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialDesignLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_design_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commercial_design_id')->unsigned();
            $table->foreign('commercial_design_id')->references('id')->on('commercial_designs')->onDelete('cascade');
            $table->float('x1');
            $table->float('y1');
            $table->float('x2');
            $table->float('y2');
            $table->string('font_name');
            $table->integer('font_weight')->unsigned();
            $table->integer('font_style');
            $table->float('font_size');
            $table->boolean('backside')->default(false);
            $table->string('text');
            $table->string('text_decoration');
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
        Schema::dropIfExists('commercial_design_labels');
    }
}
