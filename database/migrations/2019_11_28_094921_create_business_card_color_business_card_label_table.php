<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessCardColorBusinessCardLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_card_color_business_card_label', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_card_color_id')->unsigned(); 
            $table->foreign('business_card_color_id', 'color_id_foreign')->references('id')->on('business_card_colors')->onDelete('cascade');
            $table->integer('business_card_label_id')->unsigned();
            $table->foreign('business_card_label_id', 'label_id_foreign')->references('id')->on('business_card_labels')->onDelete('cascade');
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
        Schema::dropIfExists('business_card_color_business_card_label');
    }
}
