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

        $plateIds = Plate::all()->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $order = Order::find($i + 1);
            $plates = [];
            $quantity = [];
            
            
            for ($j = 0; $j < rand(2, 5); $j++) {
                $k = rand(0, 49);
                $h = rand(1,5);
                $quantity[] = $h;
                while (in_array($plateIds[$k], $plates)) {
                    $k = rand(1, 49);
                }
                $plates[] = $plateIds[$k];
            }
            // $orderPlate->save();
            for ($j = 0; $j < count($plates); $j++ ) {
                $orderPlate = new OrderPlate();
                $orderPlate->quantity = $quantity[$j];
                $orderPlate->plate_id = $plates[$j];
                $orderPlate->order_id = $order->id;
                $orderPlate->save();
            }
            //  $order->plates()->sync($plates);
        }
    }
}
