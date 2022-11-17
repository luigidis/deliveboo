<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++ ) {

            $restaurant = new Restaurant();
            $restaurant->name = $faker->words( rand(2,10), true);
            $restaurant->image = $faker->words( rand(1,10), true);
            $restaurant->address = $faker->words(rand(2,5), true);
            $restaurant->phone = $faker->numerify('+39-##########');
            $restaurant->p_iva = $faker->numerify('p-iva-########');

            $restaurant->save();
        }
    }
}