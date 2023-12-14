<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->boolean('can_be_main')->after('code')->default(false);

        });
    }

    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->dropColumns(['can_be_main']);
        });
    }
};
