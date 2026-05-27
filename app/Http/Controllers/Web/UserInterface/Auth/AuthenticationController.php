<?php

namespace App\Http\Controllers\Web\UserInterface\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
       // Auth View
    public function userRegistrationPage(){
        return view('auth.pages.registration-page');
    }
    public function userLoginPage(){
        return view('auth.pages.login-page');
    }
    public function userSendOTPPage(){
        return view('auth.pages.send-otp-page');
    }
    public function userVerifyOTPPage(){
        return view('auth.pages.verify-otp-page');
    }
    public function userResetPasswordPage(){
        return view('auth.pages.reset-pass-page');
    }

}
