<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogoPhotoToPackagingPromotionalStationeryOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->string('logo_photo')->nullable();
            $table->integer('logodesign_order_id')->unsigned()->nullable();
            $table->foreign('logodesign_order_id')->references('id')->on('logodesign_orders')->onDelete('set null');
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->string('logo_photo')->nullable();
            $table->integer('logodesign_order_id')->unsigned()->nullable();
            $table->foreign('logodesign_order_id')->references('id')->on('logodesign_orders')->onDelete('set null');
            
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->string('logo_photo')->nullable();
            $table->integer('logodesign_order_id')->unsigned()->nullable();
            $table->foreign('logodesign_order_id')->references('id')->on('logodesign_orders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->dropColumn('logo_photo');
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->dropColumn('logo_photo');
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->dropColumn('logo_photo');
        });
    }
}
