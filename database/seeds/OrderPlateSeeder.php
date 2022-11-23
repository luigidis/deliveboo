<?php

use App\Order;
use App\OrderPlate;
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

        // $plateIds = Plate::all()->pluck('id');
        $plateIds = [];
        for ($i = 1; $i < 11; $i++) {
            $plates = Plate::where('restaurant_id', $i)->pluck('id');
            $plateIds[] = $plates;
        }

        for ($i = 0; $i < 50; $i++) {
            $order = Order::find($i + 1);
            $plates = [];
            $quantity = [];
            // scelgo casualmente ristorante a cui collegare ordine
            $k = rand(0, 9);

            for ($j = 0; $j < rand(1, 2); $j++) {
                // scelgo casualmente quantità del piatto
                $h = rand(1, 5);
                $quantity[] = $h;
                // scelgo casualmente il piatto
                $l = rand(0, count($plateIds[$k]) - 1);

                while (in_array($plateIds[$k][$l], $plates)) {
                    $l = rand(0, count($plateIds[$k]) - 1);
                }

                $plates[] = $plateIds[$k][$l];
            }

            for ($j = 0; $j < count($plates); $j++) {
                $orderPlate = new OrderPlate();
                $orderPlate->quantity = $quantity[$j];
                $orderPlate->plate_id = $plates[$j];
                $orderPlate->order_id = $order->id;
                $orderPlate->save();
            }
        }
    }
}
