<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
        public function index ()
    {
        return view('backend.content.service.service-list');
    }
    public function list ()
    {
        return view('backend.content.service.service-add');
    }
    public function create ()
    {
        return view('backend.content.service.service-add');
    }
}
