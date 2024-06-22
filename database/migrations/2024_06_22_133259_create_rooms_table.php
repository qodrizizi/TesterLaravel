<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number');
            $table->unsignedBigInteger('level_id');
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('room_levels');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }

};
