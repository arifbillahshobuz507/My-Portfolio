<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function dashbord( Request $request){
//    dd($request->header());
        return view('backend.home.index');
    }
}
