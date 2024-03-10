<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function pages(){
        return view();
    }
    public function skil(Request $request){
        return $skildata = Skill::get();
    }
}
