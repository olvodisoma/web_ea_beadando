<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiakTable extends Migration
{
    public function up()
    {
        Schema::create('diak', function (Blueprint $table) {
            $table->id();                      // id
            $table->string('nev');             // név
            $table->string('osztaly')->nullable(); // pl. "12/B"
            $table->tinyInteger('fiu')->default(0); // -1=fiú, 0=lány (eredeti adat így jön)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diak');
    }
};
