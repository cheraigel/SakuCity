<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559296100655BoardroomsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('boardrooms')) {
            Schema::create('boardrooms', function (Blueprint $table) {
                $table->increments('id');
                $table->string('room_name');
                $table->string('location')->nullable();
                $table->string('description')->nullable();
                $table->integer('capacity')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('boardrooms');
    }
}
