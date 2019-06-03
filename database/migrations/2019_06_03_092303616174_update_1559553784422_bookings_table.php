<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559553784422BookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('room_name_fk_85351');
            $table->dropColumn('room_name_id');
            $table->dropColumn('time_from');
            $table->dropColumn('time_to');
            $table->dropColumn('number_of_participants');
            $table->dropColumn('meeting_duration');
            $table->dropForeign('owner_fk_85387');
            $table->dropColumn('owner_id');
            $table->dropForeign('resources_needed_fk_85435');
            $table->dropColumn('resources_needed_id');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('re')->nullable();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
        });
    }
}
