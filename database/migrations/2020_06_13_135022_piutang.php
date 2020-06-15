<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Piutang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piutang', function (Blueprint $table) {
            $table->id();
            $table->string('cust');
            $table->bigInteger('total');
            $table->bigInteger('nyd')->nullable();
            $table->bigInteger('<30')->nullable();
            $table->bigInteger('31-60')->nullable();
            $table->bigInteger('61-90')->nullable();
            $table->bigInteger('>90')->nullable();
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
        Schema::dropIfExists('piutang');
    }
}
