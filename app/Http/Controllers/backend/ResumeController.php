<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Exprience;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function pages(){
        return view();
    }
    public function exprience(Request $request){
        return $servicedata = Exprience::get();
    }
    public function education(Request $request){
        return $servicedata = Education::get();
    }
}
