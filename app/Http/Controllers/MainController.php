<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Auth;

class MainController extends Controller
{
  public function index(){


if(is_null(Auth::user())){
		  	return view('auth.login');
}

  	$hotels=Hotel::all();
  	//dd($hotels);
  	return view('main.index',compact('hotels'));
  }
}
