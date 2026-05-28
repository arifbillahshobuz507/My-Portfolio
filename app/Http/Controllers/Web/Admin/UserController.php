<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
public function index():View
    {
        return view('backend.content.skill.skill-list');
    }
    public function create(): View
    {
        return view('backend.content.skill.skill-add');
    }
    public function edit($id): View
    {
        return view('backend.content.skill.skill-edit');
    }
}
