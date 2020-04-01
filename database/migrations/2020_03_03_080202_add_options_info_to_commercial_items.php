<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOptionsInfoToCommercialItems extends Migration
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
            $table->longText('options_info')->nullable();
        });
        $seeder = new CommercialItemOptionsSeeder();
        $seeder->run();
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
            $table->dropColumn('options_info');
        });
    }
}
