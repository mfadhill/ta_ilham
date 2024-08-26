<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Arkeologis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arkeologis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('feature')->nullable();
            $table->string('sub_feature');
            $table->string('elevation')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('img')->nullable();
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
        Schema::dropIfExists('arkeologis');
    }
}
