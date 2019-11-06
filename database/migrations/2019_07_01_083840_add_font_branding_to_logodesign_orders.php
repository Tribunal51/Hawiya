<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFontBrandingToLogodesignOrders extends Migration
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
            $table->string('font');
            $table->boolean('branding')->default(false);
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
            if(Schema::hasColumn('font', 'branding')) {
                $table->dropColumn('font');
                $table->dropColumn('branding');
            }
           
        });
    }
}
