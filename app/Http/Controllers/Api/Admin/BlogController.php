<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Exception;

class BlogController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Blog::query();
            
            // 1. Search functionality (title, email, phone)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('phone', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific blog
            if ($request->filled('blog_id')) {
                $query->where('id', $request->input('blog_id'));
            }

            // 3. Filter by title
            if ($request->filled('title')) {
                $query->where('title', $request->input('title'));
            }

            // 4. Filter by email
            if ($request->filled('email')) {
                $query->where('email', $request->input('email'));
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

            // 7. Pagination
            $perPage = $request->input('per_page', 10);
            $blogs = $query->paginate($perPage);

            if ($blogs->isEmpty()) {
                return ApiResponse::success(message: 'Blog not found', data: []);
            }

            return ApiResponse::success(message: 'Blogs retrieved successfully', data: $blogs);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "title" => "nullable|string|max:100",
                "email" => "required|email|unique:blogs,email",
                "password" => "required|string|min:6|max:300",
                "phone" => "nullable|string|max:50",
            ]);

            $blog = Blog::create([
                "title" => $request->input('title', 'Admin'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone'),
                'otp' => 0,
            ]);

            return ApiResponse::success(message: "Blog Create Success!", data: $blog, status_code: 201);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "blog_id" => "required|exists:blogs,id",
                "title" => "nullable|string|max:100",
                "email" => "nullable|email|unique:blogs,email," . $request->input('blog_id'),
                "password" => "nullable|string|min:6|max:300",
                "phone" => "nullable|string|max:50",
            ]);

            $blog = Blog::where('id', $request->input('blog_id'))->first();
            
            if ($blog == null) {
                return ApiResponse::error(message: "Blog not found", status_code: 404);
            }

            $updateData = [
                'title' => $request->filled('title') ? $request->input('title') : $blog->title,
                'email' => $request->filled('email') ? $request->input('email') : $blog->email,
                'phone' => $request->filled('phone') ? $request->input('phone') : $blog->phone,
            ];

            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->input('password'));
            }

            $blog->update($updateData);

            return ApiResponse::success(message: "Blog Update Success!", data: $blog, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $blog = Blog::findOrFail($request->input('blog_id'));
            $blog->delete();
            
            return ApiResponse::success(message: 'Blog Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Blog not found', status_code: 404);
        }
    }
}