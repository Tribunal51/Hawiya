<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsImageHintToCommercialDesignLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commercial_design_labels', function (Blueprint $table) {
            //
            $table->boolean('is_image')->default(false);
            $table->string('hint')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercial_design_labels', function (Blueprint $table) {
            //
            $table->dropColumn('is_image');
            $table->dropColumn('hint');
        });
    }
}
