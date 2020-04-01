<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingReordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_reorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_token');
            $table->integer('new_quantity')->nullable();
            $table->decimal('new_price', 8,2)->nullable();
            $table->string('new_quotation')->nullable();
            $table->integer('new_address_id')->unsigned()->nullable();
            $table->foreign('new_address_id')->references('id')->on('addresses')->onDelete('set null');
            $table->bigInteger('sales_admin_id')->unsigned()->nullable();
            $table->foreign('sales_admin_id')->references('id')->on('users');
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
        Schema::dropIfExists('pending_reorders');
    }




}
