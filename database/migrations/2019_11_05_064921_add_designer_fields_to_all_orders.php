<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDesignerFieldsToAllOrders extends Migration
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
            $table->bigInteger('designer_id')->unsigned()->nullable();
            $table->foreign('designer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('designer_name')->nullable();
        });

        Schema::table('branding_orders', function (Blueprint $table) {
            //
            $table->bigInteger('designer_id')->unsigned()->nullable();
            $table->foreign('designer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('designer_name')->nullable();
        });

        Schema::table('social_media_orders', function (Blueprint $table) {
            //
            $table->bigInteger('designer_id')->unsigned()->nullable();
            $table->foreign('designer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('designer_name')->nullable();
        });

        Schema::table('stationery_orders', function (Blueprint $table) {
            //
            $table->bigInteger('designer_id')->unsigned()->nullable();
            $table->foreign('designer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('designer_name')->nullable();
        });

        Schema::table('packaging_orders', function (Blueprint $table) {
            //
            $table->bigInteger('designer_id')->unsigned()->nullable();
            $table->foreign('designer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('designer_name')->nullable();
        });

        Schema::table('promotional_orders', function (Blueprint $table) {
            //
            $table->bigInteger('designer_id')->unsigned()->nullable();
            $table->foreign('designer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('designer_name')->nullable();
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
            $table->dropColumn('designer_id');
            $table->dropColumn('designer_name');
        });

        Schema::table('branding_orders', function(Blueprint $table) {
            $table->dropColumn('designer_id');
            $table->dropColumn('designer_name');
        });

        Schema::table('social_media_orders', function(Blueprint $table) {
            $table->dropColumn('designer_id');
            $table->dropColumn('designer_name');
        });

        Schema::table('packaging_orders', function(Blueprint $table) {
            $table->dropColumn('designer_id');
            $table->dropColumn('designer_name');
        });

        Schema::table('stationery_orders', function(Blueprint $table) {
            $table->dropColumn('designer_id');
            $table->dropColumn('designer_name');
        });
    }
}
