<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceQuantityToDesignOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('logodesign_orders', function (Blueprint $table) {
            $table->string('order_token');
            $table->double('price', 8,2)->nullable();
            $table->integer('quantity')->nullable();
        });

        Schema::table('branding_orders', function (Blueprint $table) {
            $table->string('order_token');
            $table->double('price', 8,2)->nullable();
            $table->integer('quantity')->nullable();
        });

        Schema::table('social_media_orders', function (Blueprint $table) {
            $table->string('order_token');
            $table->double('price', 8,2)->nullable();
            $table->integer('quantity')->nullable();
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->string('order_token');
            $table->double('price', 8,2)->nullable();
            $table->integer('quantity')->nullable();
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->string('order_token');
            $table->double('price', 8,2)->nullable();
            $table->integer('quantity')->nullable();
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->string('order_token');
            $table->double('price', 8,2)->nullable();
            $table->integer('quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logodesign_orders', function (Blueprint $table) {
            $table->dropColumn('order_token');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
            
        });

        Schema::table('branding_orders', function (Blueprint $table) {
            $table->dropColumn('order_token');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
        });

        Schema::table('social_media_orders', function (Blueprint $table) {
            $table->dropColumn('order_token');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->dropColumn('order_token');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->dropColumn('order_token');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->dropColumn('order_token');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
        });
    }
}
