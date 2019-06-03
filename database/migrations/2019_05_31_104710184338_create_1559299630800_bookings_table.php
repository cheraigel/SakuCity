<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559299630800BookingsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('room_name_id');
                $table->foreign('room_name_id', 'room_name_fk_85351')->references('id')->on('boardrooms');
                $table->time('meeting_duration')->nullable();
                $table->datetime('time_from');
                $table->datetime('time_to');
                $table->integer('number_of_participants')->nullable();
                $table->string('resources_needed')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
