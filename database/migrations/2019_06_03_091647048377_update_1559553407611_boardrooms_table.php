<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559553407611BoardroomsTable extends Migration
{
    public function up()
    {
        Schema::table('boardrooms', function (Blueprint $table) {
            $table->dropColumn('description');
        });
        Schema::table('boardrooms', function (Blueprint $table) {
            $table->longText('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('boardrooms', function (Blueprint $table) {
        });
    }
}
