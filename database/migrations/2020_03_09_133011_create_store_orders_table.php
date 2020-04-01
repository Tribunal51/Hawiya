<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Category;

class CreateStoreOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->longText('products')->nullable();
            $table->string('comment')->nullable();
            $table->integer('category_id')->unsigned()->nullable()->default(Category::where('name', 'Store')->first()->id);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->bigInteger('store_admin_id')->unsigned()->nullable();
            $table->foreign('store_admin_id')->references('id')->on('users')->onDelete('set null');
            $table->string('store_admin_name')->nullable();
            $table->string('order_comment')->nullable();
            $table->string('delivery_period')->nullable();
            $table->string('status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
            $table->string('order_token');
            $table->decimal('price', 8,2)->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_orders');
    }
}
