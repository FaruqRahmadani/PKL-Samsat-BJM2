<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Njkb extends Model
{
  //

  public function TipeKendaraan()
  {
    return $this->belongsTo('App\TipeKendaraan');
  }

  public function MerkKendaraan()
  {
    return $this->belongsTo('App\MerkKendaraan');
  }
}
