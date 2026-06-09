<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // PROFILE VIEW
    public function profile()
    {
        return view('admin.pages.profile.view');
    }
    public function profileUpdate()
    {
        return view('admin.pages.profile.update');
    }
}
