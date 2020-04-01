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
            // $table->integer('commercial_item_id')->unsigned()->nullable();
            // $table->foreign('commercial_item_id', 'item_id')->references('id')->on('commercial_items')->onDelete('set null');
            $table->string('order_token');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('item_name')->nullable();
            $table->string('shape')->nullable();
            $table->string('orientation')->nullable();
            $table->longText('size')->nullable();
            $table->string('paper_thickness')->nullable();
            $table->text('finishing')->nullable();
            $table->boolean('backside')->default(false);
            $table->string('frontside_file')->nullable();
            $table->string('backside_file')->nullable();

            $table->text('paper')->nullable();
            $table->text('printing')->nullable();
            // $table->longText('size_info')->nullable();
            $table->text('note')->nullable();
            $table->integer('quantity')->nullable();
            $table->bigInteger('printing_admin_id')->unsigned()->nullable();
            $table->foreign('printing_admin_id')->references('id')->on('users')->onDelete('set null');

            $table->double('price', 8,2)->nullable();

            $table->integer('category_id')->unsigned()->nullable()->default(7);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
