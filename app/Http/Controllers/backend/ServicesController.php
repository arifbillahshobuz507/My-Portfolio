<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function pages(){
        return view();
    }
    public function service(Request $request){
        return $servicedata = Service::get();
    }
}
