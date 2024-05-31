<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControlller extends Controller
{
    public function home(){
        return view('frontend.home.index');
    }
}
