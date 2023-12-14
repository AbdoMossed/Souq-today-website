<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('gold_prices', function (Blueprint $table) {
            $table->unsignedBigInteger('home_currency_id')->index();
            $table->foreign('home_currency_id')->references('id')->on('currencies');
        });
    }

    
    public function down()
    {
        Schema::table('gold_prices', function (Blueprint $table) {
            $table->dropColumns(['home_currency_id']);

        });
    }
};
