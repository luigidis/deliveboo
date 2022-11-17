<?php

use App\Order;
use App\Plate;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Cast\Array_;

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

        for ($i = 0; $i < 50; $i++) {
            $ordersIds = Order::find($i + 1);
            $plates = [];
            for ($j = 0; $j < rand(2, 5); $j++) {
                $k = rand(0, 49);
                while (in_array($plate[$k], $plates)) {
                    $k = rand(1, 49);
                }
                $plates[] = $plate[$k];
            }
            $ordersIds->plates()->sync($plates);
        }
    }
}
