<?php

namespace App\Http\Controllers\Api\Backend;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userList(): JsonResponse
    {
        $users = User::orderBy("id","desc")->get();
         return ApiResponse::success(message: 'Users get Successfully', data: $users);
    }
    //store user
    public function userRegistration(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'title' => 'nullable|string',
                "email" => "required|unique:users,email|email|max:255",
                "password" => "required|string|min:8",
                'phone' => 'nullable|string|max:14|min:11'
            ]);
            $user = User::create([
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone')
            ]);
            return ApiResponse::success(message: 'User Create Successfully', data: $user);
        } catch (Exception $exception) {
            //using name parametar
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }
    //user update
    public function updateUser(Request $request)
    {
        try {
            $user = User::where('id', $request->input('user_id'))->first();
            if ($user == null) {
                return ApiResponse::error(error_data: 'User not found', status_code: 404);
            }
            // Validate the request
            $request->validate([
                'title' => 'nullable|string',
                "email" => "required|email|max:255|unique:users,email," . $user->id,
                "password" => "nullable|string|min:8",
                'phone' => 'nullable|string|max:14|min:11'
            ]);
            $user->update([
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone')
            ]);
            //using name parametar
            return ApiResponse::success(message: 'User Updated Successfully', data: $user);
        } catch (Exception $exception) {
            //using name parametar
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }
    //user delete
    public function deleteUser(Request $request)
    {
        try {
            $user = User::findOrFail($request->input('user_id'));
            $user->delete();
             return ApiResponse::success(message: 'User Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'User not found', status_code: 404);
        }
    }
}
