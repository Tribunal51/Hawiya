<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalFieldsToCommercialOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commercial_orders', function (Blueprint $table) {
            //
            $table->string('package')->nullable();
            $table->string('pages')->nullable();
            $table->boolean('endcaps')->nullable();
            $table->string('type')->nullable();
            $table->string('fold')->nullable();
            $table->string('printing_admin_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercial_orders', function (Blueprint $table) {
            //
            $table->dropColumn('package');
            $table->dropColumn('pages');
            $table->dropColumn('endcaps');
            $table->dropColumn('type');
            $table->dropColumn('fold');
            $table->dropColumn('printing_admin_name');
        });
    }
}
