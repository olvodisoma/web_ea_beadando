<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargyTable extends Migration
{
    public function up()
    {
        Schema::create('targy', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('kategoria')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('targy');
    }
};
