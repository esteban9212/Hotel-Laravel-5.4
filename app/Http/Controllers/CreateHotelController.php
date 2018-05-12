<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Auth;

class CreateHotelController extends Controller
{
    
    public function index(){

    	if(is_null(Auth::user())){
		  	return view('auth.login');
}

    $cities=City::pluck('name','id');
  	//dd($hotels);
  	return view('createHotel.index',compact('cities'));
  }
}
