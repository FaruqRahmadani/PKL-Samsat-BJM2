<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepanController extends Controller
{
  public function Index()
  {
    return view('Depan.Index');
  }

  public function Informasi()
  {
    return view('Depan.Informasi');
  }

  public function FormLogin()
  {
    return view('Depan.FormLogin');
  }

  public function submitFormLogin(Request $request)
  {
    dd($request);
  }
}
