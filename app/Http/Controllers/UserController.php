<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MerkKendaraan;
use App\TipeKendaraan;

class UserController extends Controller
{
  public function Dashboard()
  {
    $MerkKendaraan = MerkKendaraan::all();
    // dd($MerkKendaraan);
    return view('TestSelectBertingkat', ['MerkKendaraan' => $MerkKendaraan]);
  }

  public function Tipe($id)
  {
    $Tipe = TipeKendaraan::where('merkkendaraans_id', $id)->get();
    return $Tipe;
  }
}
