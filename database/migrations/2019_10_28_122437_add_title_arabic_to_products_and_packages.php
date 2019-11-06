<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleArabicToProductsAndPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('title_ar')->nullable();
        });

        Schema::table('packages', function(Blueprint $table) {
            $table->string('title_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('title_ar');

        });

        Schema::table('packages', function(Blueprint $table) {
            $table->dropColumn('title_ar');
        });
    }
}
