<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_services', function (Blueprint $table) {
            $table->unsignedBigInteger('reserve_id');
            $table->unsignedBigInteger('service_id');

            $table->foreign('reserve_id')
                ->references('id_reserve')->on('reserves')
                ->onDelete('cascade');
            $table->foreign('service_id')
                ->references('id_service')->on('services')
                ->onDelete('cascade');
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
        Schema::dropIfExists('reserve_services');
    }
}
