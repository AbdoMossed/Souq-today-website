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
        Schema::table('gold_prices', function (Blueprint $table) {
            $table->date('date')->after('sell_price');
            $table->tinyInteger('hour')->after('date');
            $table->double('international_price')->after('hour');

        });
    }

    public function down()
    {
        Schema::table('gold_prices', function (Blueprint $table) {
            $table->dropColumns(['date','hour','international_price']);
        });
    }
};
