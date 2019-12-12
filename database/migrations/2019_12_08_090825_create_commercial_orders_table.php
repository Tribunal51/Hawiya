<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commercial_item_id')->unsigned()->nullable();
            $table->foreign('commercial_item_id', 'item_id')->references('id')->on('commercial_items')->onDelete('set null');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('item_name')->nullable();
            $table->string('shape');
            $table->string('orientation');
            $table->string('size');
            $table->string('paper_thickness');
            $table->string('finishing');
            $table->boolean('backside')->default(false);
            $table->string('frontside_file');
            $table->string('backside_file')->nullable();
            $table->bigInteger('printing_admin_id')->unsigned()->nullable();
            $table->foreign('printing_admin_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('days_left')->nullable();
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
        Schema::dropIfExists('commercial_orders');
    }
}
