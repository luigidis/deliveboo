<?php

use App\Category;
use App\Restaurant;
use Illuminate\Database\Seeder;

class CategoryRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesIds = Category::all()->pluck('id');

        for ($i = 0; $i < 20; $i++) {
            $restaurant = Restaurant::find($i + 1);
            $categories = [];
            for ($j = 0; $j < rand(1, 3); $j++) {
                $k = rand(0, count($categoriesIds) - 1);
                while (in_array($categoriesIds[$k], $categories)) {
                    $k = rand(0, count($categoriesIds) - 1);
                }
                $categories[] = $categoriesIds[$k];
            }
            $restaurant->categories()->sync($categories);
        }
    }
}
