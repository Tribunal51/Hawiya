<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessCardPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_card_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_card_id')->unsigned();
            $table->foreign('business_card_id')->references('id')->on('business_cards')->onDelete('cascade');
            $table->double('with_cover');
            $table->double('without_cover');
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
        Schema::dropIfExists('business_card_prices');
    }
}
