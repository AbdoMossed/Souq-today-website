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
        Schema::table('article_reads', function (Blueprint $table) {
            $table->unique(['article_id', 'ip_address']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_reads', function (Blueprint $table) {
            $table->dropUnique(['article_id', 'ip_address']);
        });
    }
};
