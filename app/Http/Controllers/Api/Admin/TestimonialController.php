<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiResponse;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;

class TestimonialController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Testimonial::query();
            
            // 1. Search functionality (title, company_name, description)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('company_name', 'LIKE', "%{$search}%")
                        ->orWhere('short_description', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific testimonial
            if ($request->filled('testimonial_id')) {
                $query->where('id', $request->input('testimonial_id'));
            }

            // 3. Filter by title
            if ($request->filled('title')) {
                $query->where('title', $request->input('title'));
            }

            // 4. Filter by company name
            if ($request->filled('company_name')) {
                $query->where('company_name', 'LIKE', "%{$request->input('company_name')}%");
            }

            // 5. Date range filter
            if ($request->filled('from_date')) {
                $query->whereDate('created_at', '>=', $request->input('from_date'));
            }

            if ($request->filled('to_date')) {
                $query->whereDate('created_at', '<=', $request->input('to_date'));
            }

            // 6. Sorting (asc/desc)
            $sortBy = $request->input('sort_by', 'id');
            $sortOrder = $request->input('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // 7. Pagination (per page control)
            $perPage = $request->input('per_page', 10);
            $testimonials = $query->paginate($perPage);

            if ($testimonials->isEmpty()) {
                return ApiResponse::success(message: 'Testimonial not found', data: []);
            }

            return ApiResponse::success(message: 'Testimonials retrieved successfully', data: $testimonials);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "title" => "required|string|max:100",
                "company_name" => "nullable|string|max:100",
                "description" => "nullable|string",
                "short_description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048"
            ]);

            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/testimonial');
            }

            $testimonial = Testimonial::create([
                "title" => $request->input('title'),
                'company_name' => $request->input('company_name'),
                'description' => $request->input('description'),
                'short_description' => $request->input('short_description'),
                'image' => $imageName,
            ]);

            return ApiResponse::success(message: "Testimonial Create Success!", data: $testimonial, status_code: 201);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "testimonial_id" => "required|exists:testimonials,id",
                "title" => "nullable|string|max:100",
                "company_name" => "nullable|string|max:100",
                "description" => "nullable|string",
                "short_description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048"
            ]);

            $testimonial = Testimonial::where('id', $request->input('testimonial_id'))->first();
            
            if ($testimonial == null) {
                return ApiResponse::error(message: "Testimonial not found", status_code: 404);
            }

            $imageName = $testimonial->image;

            if ($request->hasFile('image')) {
                if ($testimonial->image) {
                    FileHelper::deleteFile('admin/assets/img/testimonial/' . $testimonial->image);
                }
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/testimonial');
            }

            $testimonial->update([
                'title' => $request->filled('title') ? $request->input('title') : $testimonial->title,
                'company_name' => $request->filled('company_name') ? $request->input('company_name') : $testimonial->company_name,
                'description' => $request->filled('description') ? $request->input('description') : $testimonial->description,
                'short_description' => $request->filled('short_description') ? $request->input('short_description') : $testimonial->short_description,
                'image' => $imageName,
            ]);

            return ApiResponse::success(message: "Testimonial Update Success!", data: $testimonial, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $testimonial = Testimonial::findOrFail($request->input('testimonial_id'));
            
            if ($testimonial->image) {
                FileHelper::deleteFile('admin/assets/img/testimonial/' . $testimonial->image);
            }
            
            $testimonial->delete();
            
            return ApiResponse::success(message: 'Testimonial Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Testimonial not found', status_code: 404);
        }
    }
}