<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToOrders extends Migration
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
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('branding_orders', function (Blueprint $table) {
            //
            
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('social_media_orders', function (Blueprint $table) {
            //
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('stationery_orders', function (Blueprint $table) {
            //
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('packaging_orders', function (Blueprint $table) {
            //
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('promotional_orders', function (Blueprint $table) {
            //
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
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
            $table->dropColumn('category_id');
           
            
        });

        Schema::table('branding_orders', function (Blueprint $table) {
            //
            $table->dropColumn('category_id');
        });

        Schema::table('socialmedia_orders', function (Blueprint $table) {
            //
            $table->dropColumn('category_id');
            
        });

        Schema::table('stationery_orders', function (Blueprint $table) {
            //
            $table->dropColumn('category_id');
        });

        Schema::table('packaging_orders', function (Blueprint $table) {
            //
            $table->dropColumn('category_id');
        });

        Schema::table('promotional_orders', function (Blueprint $table) {
            //
            $table->dropColumn('category_id');
        });
    }
}
