<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lokasi');
            $table->string('image');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('image');
    }
}
