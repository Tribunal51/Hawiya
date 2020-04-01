<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shape');
            $table->string('fronttextphoto')->nullable();
            $table->string('frontbasephoto')->nullable();
            $table->string('backtextphoto')->nullable();
            $table->string('backbasephoto')->nullable();
            $table->double('price_with_cover')->nullable();
            $table->double('price_without_cover')->nullable();
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
        Schema::dropIfExists('flyers');
    }
}
