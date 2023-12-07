<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('currency_id')->index();
            $table->date('date');
            $table->tinyInteger('hour');
            $table->double('price');
            $table->timestamps();

            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_prices');
    }
};
