<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;

class EducationController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Education::query();

            // 1. Search functionality (title, location)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('location', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific education
            if ($request->filled('education_id')) {
                $query->where('id', $request->input('education_id'));
            }

            // 3. Filter by title
            if ($request->filled('title')) {
                $query->where('title', $request->input('title'));
            }

            // 4. Filter by location
            if ($request->filled('location')) {
                $query->where('location', $request->input('location'));
            }

            // 5. Date range filter (based on start_learn)
            if ($request->filled('from_date')) {
                $query->whereDate('start_learn', '>=', $request->input('from_date'));
            }

            if ($request->filled('to_date')) {
                $query->whereDate('start_learn', '<=', $request->input('to_date'));
            }

            // 6. Filter by currently studying (no end date)
            if ($request->filled('is_current')) {
                if ($request->input('is_current') == true) {
                    $query->whereNull('end_learn');
                } else {
                    $query->whereNotNull('end_learn');
                }
            }

            // 7. Sorting (asc/desc)
            $sortBy = $request->input('sort_by', 'start_learn'); // default start_learn diye sort
            $sortOrder = $request->input('sort_order', 'desc'); // default descending
            $query->orderBy($sortBy, $sortOrder);

            // 8. Pagination (per page control)
            $perPage = $request->input('per_page', 10);
            $educations = $query->paginate($perPage);

            // Check if no data found
            if ($educations->isEmpty()) {
                return ApiResponse::success(message: 'Education not found', data: []);
            }

            return ApiResponse::success(message: 'Educations retrieved successfully', data: $educations);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "title" => "required|string|max:100",
                "start_learn" => "nullable|date",
                "end_learn" => "nullable|date|after:start_learn",
                "location" => "nullable|string|max:100",
                "icone" => "nullable|file|mimes:jpg,jpeg,png,svg|max:2048"
            ]);
            $iconName = null;
            if ($request->hasFile('icone')) {
                $iconName = FileHelper::uploadFile($request->file("icone"), 'admin/assets/img/experience');
            }

            $education = Education::create([
                "title" => $request->input('title'),
                'start_learn' => $request->input('start_learn'),
                'end_learn' => $request->input('end_learn'),
                'location' => $request->input('location'),
                'icone' => $iconName,
            ]);
            return ApiResponse::success(message: "Education Create Success!", data: $education, status_code: 201);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "education_id" => "required|exists:education,id",
                "title" => "nullable|string|max:100",
                "start_learn" => "nullable|date",
                "end_learn" => "nullable|date|after:start_learn",
                "location" => "nullable|string|max:100",
                "icone" => "nullable|file|mimes:jpg,jpeg,png,svg|max:2048"
            ]);

            $education = Education::where('id', $request->input('education_id'))->first();

            if ($education == null) {
                return ApiResponse::error(message: "Education not found", status_code: 404);
            }
            $iconName = $education->icone;

            // Handle icon upload
            if ($request->hasFile('icon')) {
                // Delete old icon if exists
                if ($education->icone) {
                    FileHelper::deleteFile('admin/assets/img/experience/' . $education->icone);
                }
                $iconName = FileHelper::uploadFile($request->file("icone"), 'admin/assets/img/experience');
            }
            $education->update([
                'title' => $request->filled('title') ? $request->input('title') : $education->title,
                'start_learn' => $request->filled('start_learn') ? $request->input('start_learn') : $education->start_learn,
                'end_learn' => $request->has('end_learn') ? $request->input('end_learn') : $education->end_learn,
                'location' => $request->filled('location') ? $request->input('location') : $education->location,
                'icone' => $iconName,
            ]);
            return ApiResponse::success(message: "Education Update Success!", data: $education, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $education = Education::findOrFail($request->input('education_id'));
            // Delete icon file if exists
            if ($education->icone) {
                FileHelper::deleteFile('admin/assets/img/experience/' . $education->icone);
            }
            $education->delete();
            return ApiResponse::success(message: 'Education Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Education not found', status_code: 404);
        }
    }
}
