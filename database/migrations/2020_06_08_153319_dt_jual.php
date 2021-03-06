<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DtJual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dt_jual', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('cust');
            $table->bigInteger('jumlah');
            $table->string('jns_pjln');
            $table->bigInteger('perc')->nullable();
            $table->bigInteger('hari')->nullable();
            $table->string('desc');
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
        Schema::dropIfExists('dt_jual');
    }
}
