<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelKendaraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('kendaraans', function (Blueprint $table) {
          $table->increments('id');
          $table->string('noplat');
          $table->string('noplat_lama');
          $table->string('no_ktp');
          $table->string('nama');
          $table->string('alamat');
          $table->string('no_rangka');
          $table->string('no_mesin');
          $table->date('masalaku');
          $table->integer('daerah_samsats_id');
          $table->integer('njkbs_id');
          $table->integer('jenis_tnkbs_id');
          $table->double('biaya_sw');
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
        Schema::dropIfExists('kendaraans');
    }
}
