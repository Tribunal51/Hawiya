<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_designs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commercial_item_id')->unsigned();
            $table->foreign('commercial_item_id')->references('id')->on('commercial_items')->onDelete('cascade');
            $table->string('shape')->nullable();
            $table->string('orientation')->nullable();
            $table->string('fronttextphoto')->nullable();
            $table->string('frontbasephoto')->nullable();
            $table->string('backtextphoto')->nullable();
            $table->string('backbasephoto')->nullable();
            $table->double('price_with_cover', 8,2)->nullable();
            $table->double('price_without_cover', 8,2)->nullable();
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
        Schema::dropIfExists('commercial_designs');
    }
}
