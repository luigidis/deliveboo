<?php

use App\Plate;
use App\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurantIds = Restaurant::all()->pluck('id');

        $k = 0;

        for ($i = 0; $i < 50; $i++) {
            $plate = new Plate();
            $plate->name = $faker->unique()->words(rand(1, 5), true);
            $plate->description = $faker->paragraphs(rand(1, 2), true);
            $plate->price = $faker->randomFloat(2, 2, 50);
            $plate->is_visible = $faker->boolean();
            $plate->slug = Str::slug($plate->name);

            $plate->restaurant_id = $restaurantIds[$k];

            if(!(($i + 1) % 5)) {
                $k++;
            }

            $plate->save();
        }
    }
}
