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
<<<<<<< HEAD

  public function Kendaraan()
  {
    return $this->hasMany('App\Kendaraan');
  }
=======
>>>>>>> ea2daf11df1dea958e3d4e63eb5e25396949c572
}
