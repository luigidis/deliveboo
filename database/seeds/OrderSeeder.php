<?php

use App\Order;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $status = ['Cancellato' ,'In elaborazione', 'In lavorazione', 'Completato', 'In transito', 'In consegna'];

        for ($i = 0; $i < 50; $i++) {
            $order = new Order();
            $order->status = $faker->randomElement($status);
            $order->total = floatval($faker->numerify('###.##'));
            $order->name_client = $faker->firstName();
            $order->surname_client = $faker->lastName();
            $order->address_client = $faker->address();
            $order->phone_client = $faker->numerify('+39 ### ### ####');
            $order->email_client = $faker->email();
            $order->created_at = $faker->dateTimeBetween('2022-11-01 00:00:00');

            $order->save();
        }
    }
}
