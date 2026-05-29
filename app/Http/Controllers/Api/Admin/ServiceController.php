<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\JsonResponse;


use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "title" => "required|string",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
                "icon" => "nullable|file|mimes:jpg,jpeg,png|max:2048"
            ]);
            $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/service');
            $iconName = FileHelper::uploadFile($request->file("icon"), 'admin/assets/img/service');
            $service = Service::create([
                "title" => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $imageName,
                'icon' => $iconName,
            ]);
            return ApiResponse::success(message: "Service Create Success!", data: $service, status_code: 201);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }
    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "service_id" => "required|exists:services,id",
                "title" => "nullable|string",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
                "icon" => "nullable|file|mimes:jpg,jpeg,png|max:2048"
            ]);
            $service = Service::where('id', $request->input('service_id'))->first();
            if ($service == null) {
                return ApiResponse::error(message: "service not found", status_code: 404);
            }
            $imageName =  $service->image;
            $iconName = $service->icon;

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($service->image) {
                    FileHelper::deleteFile('admin/assets/img/service/' . $service->image);
                }
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/service');
            }
            // Handle icon upload
            if ($request->hasFile('icon')) {
                // Delete old icon if exists
                if ($service->icon) {
                    FileHelper::deleteFile('admin/assets/img/service/' . $service->icon);
                }
                $iconName = FileHelper::uploadFile($request->file("icon"), 'admin/assets/img/service');
            }
            $service->update([
                'title' =>  $request->filled('title') ? $request->input('title') :  $service->title,
                'description' => $request->filled('description') ? $request->input('description') :  $service->description,
                'image' => $imageName,
                'icon' => $iconName,

            ]);
            return ApiResponse::success(message: "Service Update Success!", data: $service, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }
        //service delete
    public function delete(Request $request)
    {
        try {
            $service = Service::findOrFail($request->input('service_id'));
            $service->delete();
            return ApiResponse::success(message: 'Service Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Service not found', status_code: 404);
        }
    }
}
