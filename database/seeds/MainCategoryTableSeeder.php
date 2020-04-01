<?php

use Illuminate\Database\Seeder;
use App\Models\MainCategory;

class MainCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $main_categories = array('Branding', 'Commercial', 'Personal', 'Store');

        foreach($main_categories as $category) {
            $main_category = MainCategory::create([
                'name' => $category
            ]);
        }
    }
}
