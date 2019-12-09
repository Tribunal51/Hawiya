<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('printing_admin')->default(false);
            $table->boolean('store_admin')->default(false);
            $table->boolean('sales_admin')->default(false);
            $table->boolean('star')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('printing_admin');
            $table->dropColumn('store_admin');
            $table->dropColumn('sales_admin');
            $table->dropColumn('star');
        });
    }
}
