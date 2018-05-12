<?php

namespace App\Http\Controllers;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::user())){
            return view('auth.login');
}
        return view('home');
//      return view('main.index');
    }
}
