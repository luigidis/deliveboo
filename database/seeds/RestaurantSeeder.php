<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use App\User;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $userIds = User::all()->pluck('id');

        for ($i = 0; $i < 10; $i++) {

            $restaurant = new Restaurant();
            $restaurant->name = $faker->company();
            // TODO: da fare
            $restaurant->image = $faker->words(rand(1, 10), true);
            $restaurant->address = $faker->address();
            $restaurant->phone = $faker->phoneNumber();
            $restaurant->p_iva = $faker->numerify('###########');
            $restaurant->user_id = $userIds[$i];

            $restaurant->save();
        }
    }
}
