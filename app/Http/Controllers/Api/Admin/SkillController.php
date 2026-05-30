<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;

class SkillController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Skill::query();
            
            // 1. Search functionality (title, description)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific skill
            if ($request->filled('skill_id')) {
                $query->where('id', $request->input('skill_id'));
            }

            // 3. Filter by title
            if ($request->filled('title')) {
                $query->where('title', $request->input('title'));
            }

            // 4. Date range filter
            if ($request->filled('from_date')) {
                $query->whereDate('created_at', '>=', $request->input('from_date'));
            }

            if ($request->filled('to_date')) {
                $query->whereDate('created_at', '<=', $request->input('to_date'));
            }

            // 5. Sorting (asc/desc)
            $sortBy = $request->input('sort_by', 'id'); // default id diye sort
            $sortOrder = $request->input('sort_order', 'desc'); // default descending
            $query->orderBy($sortBy, $sortOrder);

            // 6. Pagination (per page control)
            $perPage = $request->input('per_page', 10);
            $skills = $query->paginate($perPage);

            // Check if no data found
            if ($skills->isEmpty()) {
                return ApiResponse::success(message: 'Skill not found', data: []);
            }

            return ApiResponse::success(message: 'Skills retrieved successfully', data: $skills);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "title" => "required|string|max:100",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048"
            ]);

            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/skill');
            }

            $skill = Skill::create([
                "title" => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $imageName,
            ]);

            return ApiResponse::success(message: "Skill Create Success!", data: $skill, status_code: 201);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "skill_id" => "required|exists:skills,id",
                "title" => "nullable|string|max:100",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048"
            ]);

            $skill = Skill::where('id', $request->input('skill_id'))->first();
            
            if ($skill == null) {
                return ApiResponse::error(message: "Skill not found", status_code: 404);
            }

            $imageName = $skill->image;

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($skill->image) {
                    FileHelper::deleteFile('admin/assets/img/skill/' . $skill->image);
                }
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/skill');
            }

            $skill->update([
                'title' => $request->filled('title') ? $request->input('title') : $skill->title,
                'description' => $request->filled('description') ? $request->input('description') : $skill->description,
                'image' => $imageName,
            ]);

            return ApiResponse::success(message: "Skill Update Success!", data: $skill, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $skill = Skill::findOrFail($request->input('skill_id'));
            
            // Delete image file if exists
            if ($skill->image) {
                FileHelper::deleteFile('admin/assets/img/skill/' . $skill->image);
            }
            
            $skill->delete();
            
            return ApiResponse::success(message: 'Skill Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Skill not found', status_code: 404);
        }
    }
}