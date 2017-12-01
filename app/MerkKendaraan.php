<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerkKendaraan extends Model
{
  //

  public function TipeKendaraan()
  {
    return $this->hasMany('App\TipeKendaraan');
  }
}
