<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiResponse;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HeroController extends Controller
{
    public function index()
    {
        try {
            $existingHero = Hero::select('id', 'title', 'sub_title', 'description', 'image')->orderBy('id', 'desc')->first();
            return ApiResponse::success(message: "Hero Data Get Successfully!", data: $existingHero);
        } catch (Exception $e) {
            return ApiResponse::error(message: "Failed to get hero data.", error_data: $e->getMessage());
        }
    }
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "title" => "nullable|string|max:100",
                "sub_title" => "nullable|string|max:100",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048"
            ]);
            $email = $request->header('email');
            if (!$email) {
                return ApiResponse::error(message: 'Email header is required', status_code: 422);
            }
            // Email format validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return ApiResponse::error(
                    message: 'Invalid email format',
                    status_code: 422
                );
            }
            //UPLOAD IMAGE
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/hero');
                if (!$imageName) {
                    return ApiResponse::error(
                        message: 'Image upload failed. Please try again.',
                        status_code: 422
                    );
                }
            }
            $hero = Hero::where('id', $request->input('hero_id'))
                ->where('user_id', $request->header('user_id'))
                ->first();

            if (!$hero) {
                return ApiResponse::error(message: "Hero not found", status_code: 404);
            }

            DB::beginTransaction();
            //STORE HERO 
            try {
                $hero = Hero::create([
                    "user_id" =>  $userId,
                    "title" => $request->input('title'),
                    'sub_title' => $request->input('sub_title'),
                    'description' => $request->input('description'),
                    'image' => $imageName,
                ]);
                DB::commit();
                Log::info('Hero created successfully', [
                    'hero_id' => $hero->id,
                    'user_id' => $userId
                ]);
                return ApiResponse::success(message: "Hero Create Success!", data: $hero, status_code: 201);
            } catch (Exception $e) {
                DB::rollBack();
                //DELETE SAVE IMAGE
                if ($imageName) {
                    $fullPath = public_path('admin/assets/img/hero/' . $imageName);
                    if (file_exists($fullPath)) {
                        unlink($fullPath);
                    }
                }
                Log::error('Hero creation failed', [
                    'error' => $e->getMessage(),
                    'user_id' => $userId,
                    'trace' => $e->getTraceAsString()
                ]);
                return ApiResponse::error(message: 'somthing went wrong', error_data: $e->getMessage(), status_code: 500);
            }
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }
}
