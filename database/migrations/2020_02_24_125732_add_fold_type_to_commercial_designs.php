<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFoldTypeToCommercialDesigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commercial_designs', function (Blueprint $table) {
            //
            $table->string('fold')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercial_designs', function (Blueprint $table) {
            //
            $table->dropColumn('fold');
            $table->dropColumn('type');
        });
    }
}
