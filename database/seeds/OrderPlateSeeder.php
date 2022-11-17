<?php

use App\Order;
use App\Plate;
use Illuminate\Database\Seeder;

class OrderPlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plate = Plate::all()->pluck('id');
        // $ordersIds = Order::find(1);

        // $ordersIds->plates()->sync([1,2,3]);

        for ($i = 0; $i < 50; $i++) {
            $ordersIds = Order::find($i + 1);
            for ($j = 0; $j < rand(2, 5); $j++) {
                $ordersIds->plates()->sync($plate[rand(1, 49)]);
            }
        }
    }
}
