<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
  //

  public function NJKB()
  {
    return $this->belongsTo('App\Njkb', 'njkb_id');
  }

  public function JenisTNKB()
  {
    return $this->belongsTo('App\JenisTnkb', 'jenis_tnkb_id');
  }

  public function DaerahUPPD()
  {
    return $this->belongsTo('App\DaerahSamsat', 'daerah_samsat_id');
  }
}
