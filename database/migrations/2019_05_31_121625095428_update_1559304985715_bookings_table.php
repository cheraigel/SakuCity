<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559304985715BookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('resources_needed');
            $table->dropColumn('resources_needed');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedInteger('owner_id');
            $table->foreign('owner_id', 'owner_fk_85387')->references('id')->on('users');
            $table->unsignedInteger('resources_needed_id')->nullable();
            $table->foreign('resources_needed_id', 'resources_needed_fk_85435')->references('id')->on('resources');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
        });
    }
}
