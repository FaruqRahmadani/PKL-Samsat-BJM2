<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  public function Kendaraan()
  {
    return $this->belongsTo('App\Kendaraan');
  }

  public function User()
  {
    return $this->belongsTo('App\User');
  }
}
