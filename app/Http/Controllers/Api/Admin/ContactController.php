<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;

class ContactController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Contact::query();
            
            // 1. Search functionality (first_name, last_name, email, phone)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'LIKE', "%{$search}%")
                        ->orWhere('last_name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('phone', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific contact
            if ($request->filled('contact_id')) {
                $query->where('id', $request->input('contact_id'));
            }

            // 3. Filter by service_id
            if ($request->filled('service_id')) {
                $query->where('service_id', $request->input('service_id'));
            }

            // 4. Filter by user_profile_id
            if ($request->filled('user_profile_id')) {
                $query->where('user_profile_id', $request->input('user_profile_id'));
            }

            // 5. Filter by first name
            if ($request->filled('first_name')) {
                $query->where('first_name', 'LIKE', "%{$request->input('first_name')}%");
            }

            // 6. Filter by email
            if ($request->filled('email')) {
                $query->where('email', $request->input('email'));
            }

            // 7. Date range filter
            if ($request->filled('from_date')) {
                $query->whereDate('created_at', '>=', $request->input('from_date'));
            }

            if ($request->filled('to_date')) {
                $query->whereDate('created_at', '<=', $request->input('to_date'));
            }

            // 8. Sorting
            $sortBy = $request->input('sort_by', 'id');
            $sortOrder = $request->input('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // 9. Pagination
            $perPage = $request->input('per_page', 10);
            $contacts = $query->paginate($perPage);

            if ($contacts->isEmpty()) {
                return ApiResponse::success(message: 'Contact not found', data: []);
            }

            return ApiResponse::success(message: 'Contacts retrieved successfully', data: $contacts);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "first_name" => "required|string|max:50",
                "last_name" => "nullable|string|max:100",
                "email" => "required|email",
                "phone" => "required|string",
                "description" => "nullable|string",
                "status" => "nullable|string",
            ]);

            $contact = Contact::create([
                "first_name" => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ]);

            return ApiResponse::success(message: "Contact Create Success!", data: $contact, status_code: 201);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                "contact_id" => "required|exists:contacts,id",
                "first_name" => "nullable|string|max:50",
                "last_name" => "nullable|string|max:100",
                "email" => "nullable|email",
                "phone" => "nullable|string",
                "description" => "nullable|string",
                "status" => "nullable|string",
            ]);

            $contact = Contact::where('id', $request->input('contact_id'))->first();
            
            if ($contact == null) {
                return ApiResponse::error(message: "Contact not found", status_code: 404);
            }

            $contact->update([
                'first_name' => $request->filled('first_name') ? $request->input('first_name') : $contact->first_name,
                'last_name' => $request->filled('last_name') ? $request->input('last_name') : $contact->last_name,
                'email' => $request->filled('email') ? $request->input('email') : $contact->email,
                'phone' => $request->filled('phone') ? $request->input('phone') : $contact->phone,
                'description' => $request->filled('description') ? $request->input('description') : $contact->description,
                'status' => $request->filled('status') ? $request->input('status') : $contact->status,
            ]);
            return ApiResponse::success(message: "Contact Update Success!", data: $contact, status_code: 200);
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $contact = Contact::findOrFail($request->input('contact_id'));
            $contact->delete();
            
            return ApiResponse::success(message: 'Contact Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Contact not found', status_code: 404);
        }
    }
}