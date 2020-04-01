<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $packaging_products = array();

        $stationery_products = array();

        $promotional_products = array();

        $store_products = array('Cup', 'Bottle');

        $products = array_merge($packaging_products, $stationery_products, $promotional_products);

        foreach($packaging_products as $product) {
            $category = Category::where('name', 'Packaging')->first();
            $product = Product::create([
                'title' => $product,
                'category_name' => $category->name,
                'category_id' => $category->id
            ]);
        }

        foreach($stationery_products as $product) {
            $category = Category::where('name', 'Stationery')->first();
            $product = Product::create([
                'title' => $product,
                'category_name' => $category_name,
                'category_id' => $category->id
            ]);
        }

        foreach($packaging_products as $product) {
            $category = Category::where('name', 'Promotional')->first();
            $product = Product::create([
                'title' => $product,
                'category_name' => $category->name,
                'category_id' => $category->id
            ]);
        }

        foreach($store_products as $product) {
            $category = Category::where('name', 'Store')->first();
            $product = Product::create([
                'title' => $product,
                'category_name' => $category->name,
                'category_id' => $category->id
            ]);
        }
    }
}
