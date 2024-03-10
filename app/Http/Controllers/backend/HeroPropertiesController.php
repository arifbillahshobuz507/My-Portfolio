<?php

namespace App\Http\Controllers\backend;

use App\Models\Heropoperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\Social;

class HeroPropertiesController extends Controller
{
    public function pages(){
        return view();
    }
    public function herosection(Request $request){
        return $herodata = Heropoperty::get();
    }
    public function resume(Request $request){
        return $resumedata = Resume::get();
    }
    public function social(Request $request){
        return $socialdata = Social::get();
    }
}
