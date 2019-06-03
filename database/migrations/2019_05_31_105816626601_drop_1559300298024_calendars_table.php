<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1559300298024CalendarsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('calendars');
    }
}
