<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
     public function list(Request $request): JsonResponse
    {
        try {
            $query = Project::query();
            
            // 1. Search functionality (title, description)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific project 
            if ($request->filled('project_id')) {
                $query->where('id', $request->input('project_id'));
            }

            // 3. Filter by title 
            if ($request->filled('title')) {
                $query->where('title', $request->input('title'));
            }

            // 4. Filter by service_id
            if ($request->filled('service_id')) {
                $query->where('service_id', $request->input('service_id'));
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
            $projects = $query->paginate($perPage);

            if ($projects->isEmpty()) {
                return ApiResponse::success(message: 'Project not found', data: []);
            }

            return ApiResponse::success(message: 'Projects retrieved successfully', data: $projects);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "title" => "required|string",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
                "icon" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
                "service_id" => "required|exists:services,id"
            ]);
            
            $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/project');
            $iconName = FileHelper::uploadFile($request->file("icon"), 'admin/assets/img/project');
            
            $project = Project::create([
                "title" => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $imageName,
                'icone' => $iconName,
                'service_id' => $request->input('service_id'),
            ]);
            
            return ApiResponse::success(message: "Project Create Success!", data: $project, status_code: 201);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "project_id" => "required|exists:projects,id",
                "title" => "nullable|string",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
                "icon" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
                "service_id" => "nullable|exists:services,id"
            ]);
            
            $project = Project::where('id', $request->input('project_id'))->first();
            
            if ($project == null) {
                return ApiResponse::error(message: "Project not found", status_code: 404);
            }
            
            $imageName = $project->image;
            $iconName = $project->icone;

            if ($request->hasFile('image')) {
                if ($project->image) {
                    FileHelper::deleteFile('admin/assets/img/project/' . $project->image);
                }
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/project');
            }
            
            if ($request->hasFile('icon')) {
                if ($project->icone) {
                    FileHelper::deleteFile('admin/assets/img/project/' . $project->icone);
                }
                $iconName = FileHelper::uploadFile($request->file("icon"), 'admin/assets/img/project');
            }
            
            $project->update([
                'title' => $request->filled('title') ? $request->input('title') : $project->title,
                'description' => $request->filled('description') ? $request->input('description') : $project->description,
                'image' => $imageName,
                'icone' => $iconName,
                'service_id' => $request->filled('service_id') ? $request->input('service_id') : $project->service_id,
            ]);
            
            return ApiResponse::success(message: "Project Update Success!", data: $project, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $project = Project::findOrFail($request->input('project_id'));
            
            if ($project->image) {
                FileHelper::deleteFile('admin/assets/img/project/' . $project->image);
            }
            if ($project->icone) {
                FileHelper::deleteFile('admin/assets/img/project/' . $project->icone);
            }            
            $project->delete();            
            return ApiResponse::success(message: 'Project Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Project not found', status_code: 404);
        }
    }
}
