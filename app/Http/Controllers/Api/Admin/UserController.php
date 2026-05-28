<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public function userList(Request $request): JsonResponse
{
    try {
        $query = User::query();
        // 1. Search functionality (email, phone, title)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('email', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%");
            });
        }
        
        // 2. Filter by specific user (fixed user ber korte)
        if ($request->filled('user_id')) {
            $query->where('id', $request->input('user_id'));
        }
        
        // 3. Filter by email (specific email er user)
        if ($request->filled('email')) {
            $query->where('email', $request->input('email'));
        }
        
        // 4. Filter by title
        if ($request->filled('title')) {
            $query->where('title', $request->input('title'));
        }
        
        // 5. Date range filter
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->input('from_date'));
        }
        
        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->input('to_date'));
        }
        
        // 6. Sorting (asc/desc)
        $sortBy = $request->input('sort_by', 'id'); // default id diye sort
        $sortOrder = $request->input('sort_order', 'desc'); // default descending
        $query->orderBy($sortBy, $sortOrder);
        
        // 7. Pagination (per page control)
        $perPage = $request->input('per_page', 10);
        $users = $query->paginate($perPage);
        
        // Check if no data found
        if ($users->isEmpty()) {
            return ApiResponse::success(message: 'No users found', data: []);
        }
        
        return ApiResponse::success(message: 'Users retrieved successfully', data: $users);
        
    } catch (Exception $exception) {
        return ApiResponse::error(error_data: $exception->getMessage());
    }
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
