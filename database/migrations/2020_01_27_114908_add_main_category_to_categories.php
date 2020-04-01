<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMainCategoryToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->integer('main_category_id')->unsigned()->nullable();
            $table->foreign('main_category_id')->references('id')->on('main_categories')->onDelete('set null');
        });

        $main_category_seeder = new MainCategoryTableSeeder();
        $main_category_seeder->run();

        $category_seeder = new CategoryTableSeeder();
        $category_seeder->run(); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->dropForeign('categories_main_category_id_foreign');
            $table->dropColumn('main_category_id');
        });
    }
}
