<?php

namespace App\Http\Controllers\Web\UserInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
      public function home(){
        return view('frontend.home.index');
    }

}
