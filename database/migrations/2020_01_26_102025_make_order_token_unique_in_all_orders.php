<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeOrderTokenUniqueInAllOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logodesign_orders', function(Blueprint $table) {
            $table->unique('order_token');
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            $table->unique('order_token');
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            $table->unique('order_token');
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->unique('order_token');
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->unique('order_token');
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->unique('order_token');
        });

        Schema::table('commercial_orders', function(Blueprint $table) {
            $table->unique('order_token');
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
            $table->dropUnique('logodesign_orders_order_token_unique');
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            $table->dropUnique('branding_orders_order_token_unique');
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            $table->dropUnique('social_media_orders_order_token_unique');
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->dropUnique('packaging_orders_order_token_unique');
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->dropUnique('promotional_orders_order_token_unique');
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->dropUnique('stationery_orders_order_token_unique');
        });

        Schema::table('commercial_orders', function(Blueprint $table) {
            $table->dropUnique('commercial_orders_order_token_unique');
        });
    }
}
