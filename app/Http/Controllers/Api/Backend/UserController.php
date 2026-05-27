<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\JWTToken;
use App\Mail\SendOTP;
use Exception;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
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

    public function index()
    {
        try {
            $data = User::all();
            return view('view', compact('data'));
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function addUser()
    {
        try {
            return view("view");
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function editUser($id)
    {
        try {
            $data = User::findOrFail($id);
            return view("view", compact('data'));
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function deleteUser(Request $request)
    {
        try {
            $data = User::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => $exception->getMessage()
            ]);
        }
    }



    public function updateUser(Request $request, $id)
    {
        try {
            $data = User::findOrFail($id);
            $request->validate([
                'from' => 'required'
            ]);
            $fileName = $data->image;
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required'
                ]);
                if (file_exists(public_path('image/' . $fileName))) {
                    unlink(public_path('image/' . $fileName));
                }
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->move("image/", $fileName);
            }
            $data->update([
                'database' => $request->input('from'),
                'image' => $fileName
            ]);
            return redirect()->route('name')->with(['success' => "demo Update Successfully"], 200);
        } catch (ValidationException $validationException) {
            return redirect()->back()->with('error', $validationException->getMessage())->withInput();
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

}
