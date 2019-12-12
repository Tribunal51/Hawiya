<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreviewTextColorToBusinessCardColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_card_colors', function (Blueprint $table) {
            //
            $table->string('preview_text_color')->default('black');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_card_colors', function (Blueprint $table) {
            //
            $table->dropColumn('preview_text_color');
        });
    }
}
