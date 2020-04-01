<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\MainCategory;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $branding_categories = array('Logo Design', 'Branding', 'Social Media', 'Stationery', 'Packaging', 'Promotional');

        $commercial_categories = array('Commercial');

        $personal_categories = array('Personal');

        $store_categories = array('Store');

        foreach($branding_categories as $category) {
            $main_category = MainCategory::where('name', 'Branding')->first();
            $category = Category::create([
                'name' => $category,
                'token_prefix' => substr(strtoupper($main_category->name), 0, 3),
                'main_category_id' => $main_category->id
            ]);
        }

        foreach($commercial_categories as $category) {
            $main_category = MainCategory::where('name', 'Commercial')->first();
            $category = Category::create([
                'name' => $category,
                'token_prefix' => substr(strtoupper($main_category->name), 0, 3),
                'main_category_id' => $main_category->id
            ]);
        }

        foreach($personal_categories as $category) {
            $main_category = MainCategory::where('name', 'Personal')->first();
            $category = Category::create([
                'name' => $category,
                'token_prefix' => substr(strtoupper($main_category->name), 0, 3),
                'main_category_id' => $main_category->id
            ]);
        }

        foreach($store_categories as $category) {
            $main_category = MainCategory::where('name', 'Store')->first();
            $category = Category::create([
                'name' => $category,
                'token_prefix' => substr(strtoupper($main_category->name), 0, 3),
                'main_category_id' => $main_category->id
            ]);
        }
    }
}
