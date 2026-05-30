<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;

class ExperienceController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Experience::query();
            
            // 1. Search functionality (title, location)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('location', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific experience
            if ($request->filled('experience_id')) {
                $query->where('id', $request->input('experience_id'));
            }

            // 3. Filter by title
            if ($request->filled('title')) {
                $query->where('title', $request->input('title'));
            }

            // 4. Filter by location
            if ($request->filled('location')) {
                $query->where('location', $request->input('location'));
            }

            // 5. Date range filter (based on start_job)
            if ($request->filled('from_date')) {
                $query->whereDate('start_job', '>=', $request->input('from_date'));
            }

            if ($request->filled('to_date')) {
                $query->whereDate('start_job', '<=', $request->input('to_date'));
            }

            // 6. Filter by currently working (no end date)
            if ($request->filled('is_current')) {
                if ($request->input('is_current') == true) {
                    $query->whereNull('end_job');
                } else {
                    $query->whereNotNull('end_job');
                }
            }

            // 7. Sorting (asc/desc)
            $sortBy = $request->input('sort_by', 'start_job'); // default start_job diye sort
            $sortOrder = $request->input('sort_order', 'desc'); // default descending
            $query->orderBy($sortBy, $sortOrder);

            // 8. Pagination (per page control)
            $perPage = $request->input('per_page', 10);
            $experiences = $query->paginate($perPage);

            // Check if no data found
            if ($experiences->isEmpty()) {
                return ApiResponse::success(message: 'Experience not found', data: []);
            }

            return ApiResponse::success(message: 'Experiences retrieved successfully', data: $experiences);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "title" => "required|string|max:100",
                "start_job" => "nullable|date",
                "end_job" => "nullable|date|after:start_job",
                "location" => "nullable|string|max:100",
                "icon" => "nullable|file|mimes:jpg,jpeg,png,svg|max:2048"
            ]);

            $iconName = null;
            if ($request->hasFile('icon')) {
                $iconName = FileHelper::uploadFile($request->file("icon"), 'admin/assets/img/experience');
            }

            $experience = Experience::create([
                "title" => $request->input('title'),
                'start_job' => $request->input('start_job'),
                'end_job' => $request->input('end_job'),
                'location' => $request->input('location'),
                'icone' => $iconName, 
            ]);

            return ApiResponse::success(message: "Experience Create Success!", data: $experience, status_code: 201);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "experience_id" => "required|exists:experiences,id",
                "title" => "nullable|string|max:100",
                "start_job" => "nullable|date",
                "end_job" => "nullable|date|after:start_job",
                "location" => "nullable|string|max:100",
                "icon" => "nullable|file|mimes:jpg,jpeg,png,svg|max:2048"
            ]);

            $experience = Experience::where('id', $request->input('experience_id'))->first();
            
            if ($experience == null) {
                return ApiResponse::error(message: "Experience not found", status_code: 404);
            }

            $iconName = $experience->icone;

            // Handle icon upload
            if ($request->hasFile('icon')) {
                // Delete old icon if exists
                if ($experience->icone) {
                    FileHelper::deleteFile('admin/assets/img/experience/' . $experience->icone);
                }
                $iconName = FileHelper::uploadFile($request->file("icon"), 'admin/assets/img/experience');
            }

            $experience->update([
                'title' => $request->filled('title') ? $request->input('title') : $experience->title,
                'start_job' => $request->filled('start_job') ? $request->input('start_job') : $experience->start_job,
                'end_job' => $request->has('end_job') ? $request->input('end_job') : $experience->end_job,
                'location' => $request->filled('location') ? $request->input('location') : $experience->location,
                'icone' => $iconName,
            ]);
            return ApiResponse::success(message: "Experience Update Success!", data: $experience, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $experience = Experience::findOrFail($request->input('experience_id'));
            
            // Delete icon file if exists
            if ($experience->icone) {
                FileHelper::deleteFile('admin/assets/img/experience/' . $experience->icone);
            }
            
            $experience->delete();
            
            return ApiResponse::success(message: 'Experience Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Experience not found', status_code: 404);
        }
    }
}
