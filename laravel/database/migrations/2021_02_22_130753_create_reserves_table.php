<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->bigIncrements('id_reserve');
            $table->dateTime('start_date');
            $table->integer('seat_number');
            $table->integer('total_cost');
            $table->timestamps();

            $table->unsignedBigInteger('flight_id');
            $table->unsignedBigInteger('client_id');

            $table->foreign('flight_id')
                ->references('id_flight')->on('flights')
                ->onDelete('cascade');
            $table->foreign('client_id')
                ->references('id_client')->on('clients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservs');
    }
}
