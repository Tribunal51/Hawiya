<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogodesignOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logodesign_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('package');
            $table->string('logotype');
            $table->text('style');
            $table->string('color');
            $table->string('brand_name');
            $table->string('tagline')->nullable();
            $table->string('business_field');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('logodesign_orders', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logodesign_orders');
    }
}
