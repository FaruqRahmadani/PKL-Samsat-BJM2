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
          $table->string('noplat_lama')->default('-');
          $table->string('no_ktp');
          $table->string('nama');
          $table->string('alamat');
          $table->string('no_rangka');
          $table->string('no_mesin');
          $table->date('masalaku');
          $table->integer('daerah_samsat_id');
          $table->integer('njkb_id');
          $table->integer('jenis_tnkb_id');
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
