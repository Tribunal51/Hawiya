<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('order_comment')->nullable();
            $table->decimal('total_price', 8,2);
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
            $table->string('payment_method')->nullable();
            $table->string('delivery_period')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->boolean('fast_delivery')->nullable()->default(false);
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
        // Schema::table('master_orders', function(Blueprint $table) {
        //     $table->dropForeign('master_orders_address_id_foreign');
        //     $table->dropColumn('address_id');

        //     $table->dropForeign('master_orders_user_id_foreign');
        //     $table->dropColumn('user_id');
        // });
        
        Schema::dropIfExists('master_orders');
    }
}
