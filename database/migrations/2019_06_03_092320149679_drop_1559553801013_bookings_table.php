<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1559553801013BookingsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('bookings');
    }
}
