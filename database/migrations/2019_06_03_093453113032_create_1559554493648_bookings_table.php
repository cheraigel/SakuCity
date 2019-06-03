<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559554493648BookingsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('owner_id');
                $table->foreign('owner_id', 'owner_fk_88744')->references('id')->on('users');
                $table->unsignedInteger('room_name_id');
                $table->foreign('room_name_id', 'room_name_fk_88745')->references('id')->on('boardrooms');
                $table->string('meeting_duration')->nullable();
                $table->datetime('time_from');
                $table->datetime('time_to')->nullable();
                $table->integer('number_of_participants')->nullable();
                $table->unsignedInteger('resources_needed_id')->nullable();
                $table->foreign('resources_needed_id', 'resources_needed_fk_88750')->references('id')->on('resources');
                $table->string('notification_mail')->nullable();
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
