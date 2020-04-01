<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAddressFieldsToAllOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logodesign_orders', function(Blueprint $table) {
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        });

        Schema::table('commercial_orders', function(Blueprint $table) {
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
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
            $table->dropColumn('status');
            $table->dropForeign('logodesign_orders_address_id_foreign');
            $table->dropColumn('address_id');
            
            
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('branding_orders_address_id_foreign');
            $table->dropColumn('address_id');    
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('social_media_orders_address_id_foreign');
            $table->dropColumn('address_id');
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('packaging_orders_address_id_foreign');
            $table->dropColumn('address_id');
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('stationery_orders_address_id_foreign');
            $table->dropColumn('address_id');    
        });

        Schema::table('promotional_orders', function(Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('promotional_orders_address_id_foreign');
            $table->dropColumn('address_id');
        });

        Schema::table('commercial_orders', function(Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('commercial_orders_address_id_foreign');
            $table->dropColumn('address_id');
        });
    }
}
