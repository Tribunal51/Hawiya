<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeliveryCommentFieldsToAllOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('logodesign_orders', function(Blueprint $table) {
            $table->string('order_comment')->nullable();
            $table->string('delivery_period')->nullable();
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            $table->string('order_comment')->nullable();
            $table->string('delivery_period')->nullable();
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            $table->string('order_comment')->nullable();
            $table->string('delivery_period')->nullable();
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->string('order_comment')->nullable();
            $table->string('delivery_period')->nullable();
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->string('order_comment')->nullable();
            $table->string('delivery_period')->nullable();
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->string('order_comment')->nullable();
            $table->string('delivery_period')->nullable();
        });

        Schema::table('commercial_orders', function(Blueprint $table) {
            $table->string('order_comment')->nullable();
            $table->string('delivery_period')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logodesign_orders', function(Blueprint $table) {
            $table->dropColumn('order_comment');
            $table->dropColumn('delivery_period');
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            $table->dropColumn('order_comment');
            $table->dropColumn('delivery_period');
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            $table->dropColumn('order_comment');
            $table->dropColumn('delivery_period');
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->dropColumn('order_comment');
            $table->dropColumn('delivery_period');
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->dropColumn('order_comment');
            $table->dropColumn('delivery_period');
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->dropColumn('order_comment');
            $table->dropColumn('delivery_period');
        });

        Schema::table('commercial_orders', function(Blueprint $table) {
            $table->dropColumn('order_comment');
            $table->dropColumn('delivery_period');
        });



        
    }
}
