<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRawOrderIdToRawOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('raw_orders', function (Blueprint $table) {
            //
            $table->integer('raw_order_id')->unsigned()->nullable();
            $table->foreign('raw_order_id')->references('id')->on('raw_orders')->onDelete('set null');
            $table->string('order_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('raw_orders', function (Blueprint $table) {
            //
            $table->dropForeign('raw_orders_raw_order_id_foreign');
            $table->dropColumn('raw_order_id');
            $table->dropColumn('order_token');
        });
    }
}
