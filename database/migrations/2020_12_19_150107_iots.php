<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Iots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iots', function (Blueprint $table) {
            $table->id();
            $table->float('volume', 8, 2);
            $table->float('radius', 8, 2);
            $table->float('height', 8, 2);
            $table->enum('status', ['filling', 'stop','empty']);
            $table->boolean('turn_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iots');
    }
}
