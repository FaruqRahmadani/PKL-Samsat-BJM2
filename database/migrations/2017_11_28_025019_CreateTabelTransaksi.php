<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transaksis', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kendaraan_id');
          $table->string('foto_ktp');
          $table->string('foto_stnk');
          $table->string('foto_pajak');
          $table->double('total_bayar');
          $table->integer('status')->default(0);
          $table->integer('user_id')->default(0);
          $table->string('keterangan')->default('-');
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
        Schema::dropIfExists('transaksis');
    }
}
