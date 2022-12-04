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
        // $categoriesIds = Category::all()->pluck('id');
        $countRestaurants = Restaurant::all()->count();

        $asiatico = Category::where('name', 'Asiatico')->first()->id;
        $asiatici[] = Category::where('name', 'Indiano')->first()->id;
        $asiatici[] = Category::where('name', 'Giapponese')->first()->id;
        $asiatici[] = Category::where('name', 'Cinese')->first()->id;
        $asiatici[] = Category::where('name', 'Sushi')->first()->id;

        $europeo = Category::where('name', 'Europeo')->first()->id;
        $europei[] = Category::where('name', 'Italiano')->first()->id;
        $europei[] = Category::where('name', 'Bavarese')->first()->id;
        $europei[] = Category::where('name', 'Spagnolo')->first()->id;
        $pizza = Category::where('name', 'Pizza')->first()->id;

        $sudamericano = Category::where('name', 'Sudamericano')->first()->id;
        $sudamericani[] = Category::where('name', 'Messicano')->first()->id;
        $sudamericani[] = Category::where('name', 'Brasiliano')->first()->id;


        $categories = [$asiatico, $europeo, $sudamericano];

        for ($i = 0; $i < $countRestaurants; $i++) {
            $category = [];
            $restaurant = Restaurant::find($i + 1);
            $category[] = $categories[rand(0, count($categories) - 1)];

            if ($category[0] === $asiatico) {

                for ($j = 0; $j < rand(1, count($asiatici) - 1); $j++) {
                    $k = rand(0, count($asiatici) - 1);
                    while (in_array($asiatici[$k], $category)) {
                        $k = rand(0, count($asiatici) - 1);
                    }
                    $category[] = $asiatici[$k];
                }
            } else if ($category[0] === $europeo) {

                for ($j = 0; $j < rand(1, count($europei) - 1); $j++) {
                    $k = rand(0, count($europei) - 1);
                    while (in_array($europei[$k], $category)) {
                        $k = rand(0, count($europei) - 1);
                    }
                    $category[] = $europei[$k];
                    if ($europei[$k] === $europei[0])
                        $category[] = $pizza;
                }
            } else if ($category[0] === $sudamericano) {

                for ($j = 0; $j < rand(1, count($sudamericani) - 1); $j++) {
                    $k = rand(0, count($sudamericani) - 1);
                    while (in_array($sudamericani[$k], $category)) {
                        $k = rand(0, count($sudamericani) - 1);
                    }
                    $category[] = $sudamericani[$k];
                }
            }

            $restaurant->categories()->sync($category);
        }
    }
}
