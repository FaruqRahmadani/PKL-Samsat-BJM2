<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelNJKB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('NJKBs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('merk_kendaraans_id');
          $table->integer('tipe_kendaraans_id');
          $table->string('tahun_buat');
          $table->double('NJKB', 12,0);
          $table->double('bobot');
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
        Schema::dropIfExists('NJKBs');
    }
}
