<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->dateTime('date'); sostituibile con il timestamps in fondo
            $table->string('status', '75');
            $table->float('total', 6, 2); // max 9999,99 $
            $table->string('name_client', '100');
            $table->string('surname_client', '100');
            $table->string('address_client', '255');
            $table->string('phone_client', '20');
            $table->string('email_client', '255');
            // $table->tinyInteger('time_ready'); // tempo di preparazione da aggiungere al timestamps (created_at)
            // $table->time('hour-delivery'); possiamo volendo ricavarci l'ora dal timestamps in fondo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
