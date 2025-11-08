<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJegyTable extends Migration
{
    public function up()
    {
        Schema::create('jegy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diak_id');
            $table->date('datum')->nullable();
            $table->tinyInteger('ertek');
            $table->string('tipus')->nullable();
            $table->unsignedBigInteger('targy_id');
            $table->timestamps();

            // Indexek / FK-k
            $table->foreign('diak_id')->references('id')->on('diak')->onDelete('cascade');
            $table->foreign('targy_id')->references('id')->on('targy')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jegy');
    }
};
