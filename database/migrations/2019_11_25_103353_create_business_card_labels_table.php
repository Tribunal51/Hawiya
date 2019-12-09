<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessCardLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_card_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_card_id')->unsigned();
            $table->foreign('business_card_id')->references('id')->on('business_cards')->onDelete('cascade');
            $table->float('x1');
            $table->float('y1');
            $table->float('x2');
            $table->float('y2');
            $table->string('font_name');
            $table->string('font_weight')->nullable();
            $table->double('font_size');
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
        Schema::dropIfExists('business_card_labels');
    }
}
