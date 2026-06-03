<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    //get user profile
    public function userProfile(Request $request): JsonResponse
    {
        try {
            $user = User::where("email", $request->header('email'))->first();
            if (!$user) {
                return ApiResponse::success(message: 'unauthorized', data: [], status_code: 401);
            }
            $userProfile = UserProfile::where('user_id', $user->id)->first();
            // Check if no data found
            if (!$userProfile) {
                return ApiResponse::success(message: 'user prodile not found', data: []);
            }
            return ApiResponse::success(message: 'Users profile retrieved successfully', data: $userProfile);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }
    //store/update profile user
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'title' => 'nullable|string',
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
            $user = User::find($request->input('user_id'));
            if ($user == null) {
                return ApiResponse::success(message: 'user not found', data: []);
            }

            // Handle file uploads with old file deletion
            $existingProfile = UserProfile::where('user_id', $request->input('user_id'))->first();

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
                ['user_id' => $request->input('user_id')],
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
            return ApiResponse::success(message: $message, data: $profile);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }
}
