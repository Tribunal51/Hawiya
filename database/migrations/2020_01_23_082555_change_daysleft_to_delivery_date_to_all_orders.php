<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDaysleftToDeliveryDateToAllOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logodesign_orders', function(Blueprint $table) {
            $table->dropColumn('days_left');
            $table->dateTime('delivery_date')->nullable();
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            $table->dropColumn('days_left');
            $table->dateTime('delivery_date')->nullable();
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            $table->dropColumn('days_left');
            $table->dateTime('delivery_date')->nullable();
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->dropColumn('days_left');
            $table->dateTime('delivery_date')->nullable();
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->dropColumn('days_left');
            $table->dateTime('delivery_date')->nullable();
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->dropColumn('days_left');
            $table->dateTime('delivery_date')->nullable();
        });

        Schema::table('commercial_orders', function(Blueprint $table) {
            $table->dropColumn('days_left');
            $table->dateTime('delivery_date')->nullable();
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
            //
            $table->integer('days_left')->nullable();
            $table->dropColumn('delivery_date');
        });

        Schema::table('branding_orders', function (Blueprint $table) {
            //
            $table->integer('days_left')->nullable();
            $table->dropColumn('delivery_date');
        });

        Schema::table('social_media_orders', function (Blueprint $table) {
            //
            $table->integer('days_left')->nullable();
            $table->dropColumn('delivery_date');
        });

        Schema::table('packaging_orders', function (Blueprint $table) {
            //
            $table->integer('days_left')->nullable();
            $table->dropColumn('delivery_date');
        });

        Schema::table('promotional_orders', function (Blueprint $table) {
            //
            $table->integer('days_left')->nullable();
            $table->dropColumn('delivery_date');
        });

        Schema::table('stationery_orders', function (Blueprint $table) {
            //
            $table->integer('days_left')->nullable();
            $table->dropColumn('delivery_date');
        });

        Schema::table('commercial_orders', function (Blueprint $table) {
            //
            $table->integer('days_left')->nullable();
            $table->dropColumn('delivery_date');
        });
    }
}
