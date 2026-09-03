<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    //list
    public function index()
    {
        return view('admin.pages.hero.list');
    }
    //create
    public function create()
    {
        return view('admin.pages.hero.create');
    }
    //update
    public function update()
    {
        return view('admin.pages.hero.update');
    }
}
