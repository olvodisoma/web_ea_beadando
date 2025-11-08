<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUzenetTable extends Migration
{
    public function up()
    {
        Schema::create('uzenet', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('email');
            $table->string('tema')->nullable();
            $table->text('uzenet');
            $table->timestamps(); // created_at = küldés ideje
        });
    }

    public function down()
    {
        Schema::dropIfExists('uzenet');
    }
};
