<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function pages(){
        return view();
    }
    public function project(Request $request){
        return $projectdata = Project::get();
    }
}
