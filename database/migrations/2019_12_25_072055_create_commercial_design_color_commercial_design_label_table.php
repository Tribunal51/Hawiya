<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialDesignColorCommercialDesignLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_design_color_commercial_design_label', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commercial_design_color_id')->unsigned(); 
            $table->foreign('commercial_design_color_id', 'commercial_color_id_foreign')->references('id')->on('commercial_design_colors')->onDelete('cascade');
            $table->integer('commercial_design_label_id')->unsigned();
            $table->foreign('commercial_design_label_id', 'commercial_label_id_foreign')->references('id')->on('commercial_design_labels')->onDelete('cascade');
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
        Schema::dropIfExists('commercial_design_color_commercial_design_label');
    }
}
