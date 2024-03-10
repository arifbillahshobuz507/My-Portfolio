<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function pages(){
        return view();
    }
    public function contact(Request $request){
        return $contactdata = Contact::get();
    }
    public function aboutme(Request $request){
        return $aboutmedata = AboutMe::get();
    }
}
