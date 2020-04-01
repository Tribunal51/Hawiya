<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialDesignColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_design_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commercial_design_id')->unsigned();
            $table->foreign('commercial_design_id')->references('id')->on('commercial_designs')->onDelete('cascade');
            $table->string('name');
            $table->string('preview_image')->nullable();
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
        Schema::dropIfExists('commercial_design_colors');
    }
}
