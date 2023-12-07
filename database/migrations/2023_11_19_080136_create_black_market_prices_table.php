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
        Schema::create('black_market_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('currency_id')->index();
            $table->double('buy_price');
            $table->double('sell_price');
            $table->date('date');
            $table->tinyInteger('hour');
            $table->foreign('currency_id')->references('id')->on('currencies');
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
        Schema::dropIfExists('black_market_prices');
    }
};
