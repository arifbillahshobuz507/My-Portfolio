<?php

namespace App\Http\Controllers\Web\UserInterface\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    // Auth View
    public function userRegistrationPage(){
        return view('auth.content.registration-page');
    }
    public function userLoginPage(){
        return view('auth.content.login-page');
    }
    public function userSendOTPPage(){
        return view('auth.content.send-otp-page');
    }
    public function userVerifyOTPPage(){
        return view('auth.content.verify-otp-page');
    }
    public function userResetPasswordPage(){
        return view('auth.content.reset-pass-page');
    }

}
