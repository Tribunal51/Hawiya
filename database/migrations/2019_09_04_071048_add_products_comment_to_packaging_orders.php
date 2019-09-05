<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsCommentToPackagingOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packaging_orders', function (Blueprint $table) {
            //
            $table->string('products');
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packaging_orders', function (Blueprint $table) {
            //
            $table->dropColumn('products');
            $table->dropColumn('comment');
        });
    }
}
