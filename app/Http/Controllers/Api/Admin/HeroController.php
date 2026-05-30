<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;

class HeroController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Hero::with(['user', 'userProfile', 'experience', 'project', 'testimonial']);
            
            // 1. Search functionality (title)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('title', 'LIKE', "%{$search}%");
            }

            // 2. Filter by specific hero
            if ($request->filled('hero_id')) {
                $query->where('id', $request->input('hero_id'));
            }

            // 3. Filter by title
            if ($request->filled('title')) {
                $query->where('title', 'LIKE', "%{$request->input('title')}%");
            }

            // 4. Filter by user_id
            if ($request->filled('user_id')) {
                $query->where('user_id', $request->input('user_id'));
            }

            // 5. Filter by user_profile_id
            if ($request->filled('user_profile_id')) {
                $query->where('user_profile_id', $request->input('user_profile_id'));
            }

            // 6. Filter by experience_id
            if ($request->filled('experience_id')) {
                $query->where('experience_id', $request->input('experience_id'));
            }

            // 7. Filter by project_id
            if ($request->filled('project_id')) {
                $query->where('project_id', $request->input('project_id'));
            }

            // 8. Filter by testimonial_id
            if ($request->filled('testimonial_id')) {
                $query->where('testimonial_id', $request->input('testimonial_id'));
            }

            // 9. Date range filter
            if ($request->filled('from_date')) {
                $query->whereDate('created_at', '>=', $request->input('from_date'));
            }

            if ($request->filled('to_date')) {
                $query->whereDate('created_at', '<=', $request->input('to_date'));
            }

            // 10. Sorting
            $sortBy = $request->input('sort_by', 'id');
            $sortOrder = $request->input('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // 11. Pagination
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
                "user_id" => "required|exists:users,id|unique:heroes,user_id",
                "user_profile_id" => "required|exists:user_profiles,id",
                "experience_id" => "required|exists:experiences,id",
                "project_id" => "required|exists:projects,id",
                "testimonial_id" => "required|exists:testimonials,id",
            ]);

            $hero = Hero::create([
                "title" => $request->input('title'),
                'user_id' => $request->input('user_id'),
                'user_profile_id' => $request->input('user_profile_id'),
                'experience_id' => $request->input('experience_id'),
                'project_id' => $request->input('project_id'),
                'testimonial_id' => $request->input('testimonial_id'),
            ]);

            return ApiResponse::success(message: "Hero Create Success!", data: $hero, status_code: 201);
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
                "user_id" => "nullable|exists:users,id|unique:heroes,user_id," . $request->input('hero_id'),
                "user_profile_id" => "nullable|exists:user_profiles,id",
                "experience_id" => "nullable|exists:experiences,id",
                "project_id" => "nullable|exists:projects,id",
                "testimonial_id" => "nullable|exists:testimonials,id",
            ]);

            $hero = Hero::where('id', $request->input('hero_id'))->first();
            
            if ($hero == null) {
                return ApiResponse::error(message: "Hero data not found", status_code: 404);
            }

            $hero->update([
                'title' => $request->filled('title') ? $request->input('title') : $hero->title,
                'user_id' => $request->filled('user_id') ? $request->input('user_id') : $hero->user_id,
                'user_profile_id' => $request->filled('user_profile_id') ? $request->input('user_profile_id') : $hero->user_profile_id,
                'experience_id' => $request->filled('experience_id') ? $request->input('experience_id') : $hero->experience_id,
                'project_id' => $request->filled('project_id') ? $request->input('project_id') : $hero->project_id,
                'testimonial_id' => $request->filled('testimonial_id') ? $request->input('testimonial_id') : $hero->testimonial_id,
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
            $hero->delete();
            
            return ApiResponse::success(message: 'Hero Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Hero data not found', status_code: 404);
        }
    }
}