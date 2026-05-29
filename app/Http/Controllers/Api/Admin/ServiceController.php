<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\JsonResponse;
use Nette\Schema\ValidationException;


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
            $service = Service::findOrFail($request->input('service_id'));
            dd($service);
            $request->validate([
                "title" => "required|string",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
                "icon" => "nullable|file|mimes:jpg,jpeg,png|max:2048"
            ]);

            $data = [
                "title" => $request->input('title'),
                "description" => $request->input('description'),
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($service->image) {
                    FileHelper::deleteFile('admin/assets/img/service/' . $service->image);
                }
                $imageName = FileHelper::uploadFile($request->file("image"), 'admin/assets/img/service');
                $data['image'] = $imageName;
            }

            // Handle icon upload
            if ($request->hasFile('icon')) {
                // Delete old icon if exists
                if ($service->icon) {
                    FileHelper::deleteFile('admin/assets/img/service/' . $service->icon);
                }
                $iconName = FileHelper::uploadFile($request->file("icon"), 'admin/assets/img/service');
                $data['icon'] = $iconName;
            }

            $service->update($data);

            return ApiResponse::success(message: "Service Update Success!", data: $service, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }
}
