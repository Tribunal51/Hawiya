<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEtaToAllOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logodesign_orders', function (Blueprint $table) {
            //
            $table->bigInteger('days_left')->nullable();
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            // 
            $table->bigInteger('days_left')->nullable();
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            //
            $table->bigInteger('days_left')->nullable();
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            //
            $table->bigInteger('days_left')->nullable();
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            //
            $table->bigInteger('days_left')->nullable();
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            //
            $table->bigInteger('days_left')->nullable();
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
            
            $table->dropColumn('days_left');
            
            
        });

        Schema::table('branding_orders', function (Blueprint $table) {
            //
            $table->dropColumn('days_left');
        });

        Schema::table('social_media_orders', function (Blueprint $table) {
            //
            $table->dropColumn('days_left');
        });

        Schema::table('packaging_orders', function (Blueprint $table) {
            //
            $table->dropColumn('days_left');
        });

        Schema::table('stationery_orders', function (Blueprint $table) {
            //
            $table->dropColumn('days_left');
        });

        Schema::table('promotional_orders', function (Blueprint $table) {
            //
            $table->dropColumn('days_left');
        });
    }
}
