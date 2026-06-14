<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiResponse;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use App\Models\UserProfile;
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
                $query->where(function ($q) use ($search) {
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
            $userId = $request->header('user_id');
            $user = User::where('id', $userId)->with('profile')->first();
            if ($user == null) {
                return ApiResponse::error(error_data: 'User not found', status_code: 404);
            }
            // return response()->json($user);
            // Validate the request
            $request->validate([
                'title' => 'nullable|string',
                "email" => "required|email|max:255|unique:users,email," . $user->id,
                "password" => "nullable|string|min:8",
                'phone' => 'nullable|string|max:14|min:11',
                'name' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
                'facebook' => 'nullable|url|max:300',
                'instagram' => 'nullable|url|max:300',
                'linkedin' => 'nullable|url|max:300',
                'github' => 'nullable|url|max:300',
                'twitter' => 'nullable|url|max:300',
            ]);
            // Update user basic info
            $user->update([
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone')
            ]);

            // Handle file uploads with old file deletion
            $existingProfile = $user->profile;
            $imageName = $existingProfile ? $existingProfile->image : null;
            if ($request->hasFile('image')) {
                if ($existingProfile && $existingProfile->image) {
                    FileHelper::deleteFile($existingProfile->image, 'admin/assets/img/profile');
                }
                $imageName = FileHelper::uploadFile($request->file('image'), 'admin/assets/img/profile');
            }
            $logoName = $existingProfile ? $existingProfile->logo : null;
            if ($request->hasFile('logo')) {
                if ($existingProfile && $existingProfile->logo) {
                    FileHelper::deleteFile($existingProfile->logo, 'admin/assets/img/profile');
                }
                $logoName = FileHelper::uploadFile($request->file('logo'), 'admin/assets/img/profile');
            }
            $cvName = $existingProfile ? $existingProfile->cv : null;
            if ($request->hasFile('cv')) {
                if ($existingProfile && $existingProfile->cv) {
                    FileHelper::deleteFile($existingProfile->cv, 'admin/assets/img/profile');
                }
                $cvName = FileHelper::uploadFile($request->file('cv'), 'admin/assets/img/profile');
            }
            // Create or Update profile
            $profile = UserProfile::updateOrCreate(
                ['user_id' => $userId],
                [
                    'description' => $request->input('description'),
                    'cv' => $cvName,
                    'logo' => $logoName,
                    'image' => $imageName,
                    'facebook' => $request->input('facebook', 'https://www.facebook.com/'),
                    'instagram' => $request->input('instagram', 'https://www.instagram.com/'),
                    'linkedin' => $request->input('linkedin', 'https://www.linkedin.com/'),
                    'github' => $request->input('github', 'https://www.github.com/'),
                    'twitter' => $request->input('twitter', 'https://www.twitter.com/'),
                ]
            );
            $message = $profile->wasRecentlyCreated ? 'Profile Created Successfully' : 'Profile Updated Successfully';
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
