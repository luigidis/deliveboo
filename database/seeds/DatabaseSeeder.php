<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RestaurantSeeder::class,
            CategorySeeder::class,
            CategoryRestaurantSeeder::class,
            PlateSeeder::class,
            OrderSeeder::class,
            OrderPlateSeeder::class,
        ]);
    }
}
