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
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Hero::query();

            // 1. Search functionality (title, sub_title, description)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('sub_title', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific hero
            if ($request->filled('hero_id')) {
                $query->where('id', $request->input('hero_id'));
            }

            // 3. Filter by title
            if ($request->filled('title')) {
                $query->where('title', 'LIKE', "%{$request->input('title')}%");
            }

            // 4. Filter by sub_title
            if ($request->filled('sub_title')) {
                $query->where('sub_title', 'LIKE', "%{$request->input('sub_title')}%");
            }

            // 5. Date range filter
            if ($request->filled('from_date')) {
                $query->whereDate('created_at', '>=', $request->input('from_date'));
            }

            if ($request->filled('to_date')) {
                $query->whereDate('created_at', '<=', $request->input('to_date'));
            }

            // 6. Sorting
            $sortBy = $request->input('sort_by', 'id');
            $sortOrder = $request->input('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // 7. Pagination
            $perPage = $request->input('per_page', 10);
            $heroes = $query->paginate($perPage);

            if ($heroes->isEmpty()) {
                return ApiResponse::success(message: 'Hero data not found', data: []);
            }

            return ApiResponse::success(message: 'Heroes retrieved successfully', data: $heroes);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
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
            $userId = User::where('email', $email)->value('id');
            if (!$userId) {
                return ApiResponse::error(message: 'User not found', status_code: 404);
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



    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "hero_id" => "required|exists:heroes,id",
                "title" => "nullable|string|max:100",
                "sub_title" => "nullable|string|max:100",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048"
            ]);

            $hero = Hero::where('id', $request->input('hero_id'))->first();

            if ($hero == null) {
                return ApiResponse::error(message: "Hero data not found", status_code: 404);
            }

            $imageName = $hero->image;

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($hero->image) {
                    FileHelper::deleteFile('admin/assets/img/hero/' . $hero->image);
                }
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/hero');
            }

            $hero->update([
                'title' => $request->filled('title') ? $request->input('title') : $hero->title,
                'sub_title' => $request->filled('sub_title') ? $request->input('sub_title') : $hero->sub_title,
                'description' => $request->filled('description') ? $request->input('description') : $hero->description,
                'image' => $imageName,
            ]);

            return ApiResponse::success(message: "Hero Update Success!", data: $hero, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $hero = Hero::findOrFail($request->input('hero_id'));

            // Delete image file if exists
            if ($hero->image) {
                FileHelper::deleteFile('admin/assets/img/hero/' . $hero->image);
            }

            $hero->delete();

            return ApiResponse::success(message: 'Hero Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Hero data not found', status_code: 404);
        }
    }

    // Get single hero by ID
    public function show(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "hero_id" => "required|exists:heroes,id"
            ]);

            $hero = Hero::find($request->input('hero_id'));

            if (!$hero) {
                return ApiResponse::error(message: "Hero not found", status_code: 404);
            }

            return ApiResponse::success(message: "Hero retrieved successfully", data: $hero);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    // Get active hero for frontend
    public function getActiveHero(): JsonResponse
    {
        try {
            // Get latest hero or first hero
            $hero = Hero::latest()->first();

            if (!$hero) {
                return ApiResponse::success(message: 'No hero found', data: []);
            }

            return ApiResponse::success(message: 'Active hero retrieved successfully', data: $hero);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }
}
