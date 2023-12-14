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
        Schema::table('black_market_prices', function (Blueprint $table) {
            $table->foreignId('home_currency_id')->constrained('currencies')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('black_market_prices', function (Blueprint $table) {
            $table->dropColumns(['home_currency_id']);
        });
    }
};
