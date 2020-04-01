<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArabicFieldToCommercialPersonalItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commercial_items', function (Blueprint $table) {
            //
            $table->string('name_ar')->nullable();
        });

        Schema::table('personal_items', function (Blueprint $table) {
            //
            $table->string('name_ar')->nullable();
        });

        Schema::table('personal_subitems', function (Blueprint $table) {
            //
            $table->string('name_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercial_items', function (Blueprint $table) {
            //
            $table->dropColumn('name_ar');
        });

        Schema::table('personal_items', function (Blueprint $table) {
            // 
            $table->dropColumn('name_ar');
        });

        Schema::table('personal_subitems', function (Blueprint $table) {
            $table->dropColumn('name_ar');
        });

        
    }
}
