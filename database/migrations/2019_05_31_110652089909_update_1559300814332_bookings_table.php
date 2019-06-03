<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559300814332BookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('resources_needed');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->boolean('resources_needed')->default(0)->nullable();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
        });
    }
}
