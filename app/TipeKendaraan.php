<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeKendaraan extends Model
{
  //

  public function Golongan()
  {
    return $this->belongsTo('App\Golongan');
  }

  public function MerkKendaraan()
  {
    return $this->belongsTo('App\MerkKendaraan');
  }
}
