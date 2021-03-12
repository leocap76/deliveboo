<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config("categories");

        foreach($categories as $key => $category) {
            $db = new Category();

            $db->fill($category);
            $db->save();
        }
    }
}
