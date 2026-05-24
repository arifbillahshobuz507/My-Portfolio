<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Exception;

class SkillController extends Controller
{
     /**
     * Display the skill list view
     */
    public function index(): \Illuminate\View\View
    {
        return view('backend.content.skill.skill-list');
    }

    /**
     * Display the skill add form view
     */
    public function create(): \Illuminate\View\View
    {
        return view('backend.content.skill.skill-add');
    }

    /**
     * Display the skill edit form view
     */
    public function edit($id): \Illuminate\View\View
    {
        $skill = Skill::findOrFail($id);
        return view('backend.content.skill.skill-edit', compact('skill'));
    }

    /**
     * Store a newly created skill
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                "name" => "required|string|max:255|unique:skills,name",
                "icon" => "nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048",
                "percent" => "required|integer|min:0|max:100"
            ]);

            $skill = new Skill();
            $skill->name = $validated['name'];
            $skill->percent = $validated['percent'];

            // Handle icon upload
            if ($request->hasFile('icon')) {
                $iconFile = $request->file('icon');
                $iconName = date('YmdHis') . '_' . uniqid() . '.' . $iconFile->getClientOriginalExtension();
                $iconFile->move(public_path('uploads/skills'), $iconName);
                $skill->icon = 'uploads/skills/' . $iconName;
            } else if ($request->has('icon_class')) {
                // If using CSS class for icons (FontAwesome, etc.)
                $skill->icon = $request->icon_class;
            }

            $skill->save();

            return response()->json([
                "status" => "success",
                "message" => "Skill created successfully!",
                "data" => $skill
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                "status" => "error",
                "message" => "Validation failed",
                "errors" => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Something went wrong: " . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all skills (for API / Frontend)
     */
    public function getSkills(): JsonResponse
    {
        try {
            $skills = Skill::active()->ordered()->get();
            
            // Format for frontend display
            $formattedSkills = $skills->map(function($skill) {
                return [
                    'id' => $skill->id,
                    'name' => $skill->name,
                    'icon' => $skill->icon,
                    'icon_url' => $skill->icon_url,
                    'percent' => $skill->percent,
                    'status' => $skill->status
                ];
            });
            
            return response()->json([
                "status" => "success",
                "data" => $formattedSkills
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get a single skill by ID
     */
    public function show($id): JsonResponse
    {
        try {
            $skill = Skill::findOrFail($id);
            
            return response()->json([
                "status" => "success",
                "data" => [
                    'id' => $skill->id,
                    'name' => $skill->name,
                    'icon' => $skill->icon,
                    'icon_url' => $skill->icon_url,
                    'percent' => $skill->percent
                ]
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Skill not found"
            ], 404);
        }
    }

    /**
     * Get all skills for datatable
     */
    public function getSkillsDataTable(Request $request): JsonResponse
    {
        try {
            $skills = Skill::query();
            
            // Search functionality
            if ($request->has('search') && $request->search['value']) {
                $search = $request->search['value'];
                $skills->where('name', 'like', "%{$search}%");
            }
            
            // Sorting
            if ($request->has('order')) {
                $columnIndex = $request->order[0]['column'];
                $columnName = $request->columns[$columnIndex]['data'];
                $direction = $request->order[0]['dir'];
                $skills->orderBy($columnName, $direction);
            } else {
                $skills->orderBy('order_position', 'asc')->orderBy('name', 'asc');
            }
            
            // Pagination
            $totalRecords = $skills->count();
            $records = $skills->skip($request->start)->take($request->length)->get();
            
            return response()->json([
                "draw" => intval($request->draw),
                "recordsTotal" => $totalRecords,
                "recordsFiltered" => $totalRecords,
                "data" => $records
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update an existing skill
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $validated = $request->validate([
                "name" => "required|string|max:255|unique:skills,name," . $id,
                "icon" => "nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048",
                "percent" => "required|integer|min:0|max:100"
            ]);

            $skill = Skill::findOrFail($id);
            $skill->name = $validated['name'];
            $skill->percent = $validated['percent'];

            // Handle icon upload
            if ($request->hasFile('icon')) {
                // Delete old icon if exists
                if ($skill->icon && file_exists(public_path($skill->icon))) {
                    unlink(public_path($skill->icon));
                }
                
                $iconFile = $request->file('icon');
                $iconName = date('YmdHis') . '_' . uniqid() . '.' . $iconFile->getClientOriginalExtension();
                $iconFile->move(public_path('uploads/skills'), $iconName);
                $skill->icon = 'uploads/skills/' . $iconName;
            } else if ($request->has('icon_class')) {
                $skill->icon = $request->icon_class;
            }

            $skill->save();

            return response()->json([
                "status" => "success",
                "message" => "Skill updated successfully!",
                "data" => $skill
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                "status" => "error",
                "message" => "Validation failed",
                "errors" => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Something went wrong: " . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a skill
     */
    public function destroy($id): JsonResponse
    {
        try {
            $skill = Skill::findOrFail($id);
            
            // Delete associated icon file
            if ($skill->icon && file_exists(public_path($skill->icon))) {
                unlink(public_path($skill->icon));
            }
            
            $skill->delete();

            return response()->json([
                "status" => "success",
                "message" => "Skill deleted successfully!"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to delete skill: " . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Bulk delete skills
     */
    public function bulkDelete(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'exists:skills,id'
            ]);

            $skills = Skill::whereIn('id', $request->ids)->get();
            
            // Delete all associated icon files
            foreach ($skills as $skill) {
                if ($skill->icon && file_exists(public_path($skill->icon))) {
                    unlink(public_path($skill->icon));
                }
            }
            
            Skill::whereIn('id', $request->ids)->delete();

            return response()->json([
                "status" => "success",
                "message" => count($request->ids) . " skills deleted successfully!"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to delete skills: " . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update skill status (active/inactive)
     */
    public function updateStatus(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'status' => 'required|in:active,inactive'
            ]);

            $skill = Skill::findOrFail($id);
            $skill->status = $request->status;
            $skill->save();

            return response()->json([
                "status" => "success",
                "message" => "Skill status updated successfully!"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to update status: " . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Reorder skills (for drag-drop sorting)
     */
    public function reorder(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'orders' => 'required|array',
                'orders.*.id' => 'exists:skills,id',
                'orders.*.position' => 'integer'
            ]);

            foreach ($request->orders as $item) {
                Skill::where('id', $item['id'])->update(['order_position' => $item['position']]);
            }

            return response()->json([
                "status" => "success",
                "message" => "Skills reordered successfully!"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to reorder: " . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Seed default skills (Figma, Sketch, XD, WordPress, React, JavaScript)
     */
    public function seedDefaultSkills(): JsonResponse
    {
        try {
            $defaultSkills = [
                ['name' => 'Figma', 'percent' => 92, 'icon' => 'fab fa-figma', 'status' => 'active', 'order_position' => 1],
                ['name' => 'Sketch', 'percent' => 80, 'icon' => 'fab fa-sketch', 'status' => 'active', 'order_position' => 2],
                ['name' => 'XD', 'percent' => 85, 'icon' => 'fab fa-adobe', 'status' => 'active', 'order_position' => 3],
                ['name' => 'WordPress', 'percent' => 99, 'icon' => 'fab fa-wordpress', 'status' => 'active', 'order_position' => 4],
                ['name' => 'React', 'percent' => 89, 'icon' => 'fab fa-react', 'status' => 'active', 'order_position' => 5],
                ['name' => 'JavaScript', 'percent' => 93, 'icon' => 'fab fa-js', 'status' => 'active', 'order_position' => 6],
            ];

            foreach ($defaultSkills as $skill) {
                Skill::updateOrCreate(
                    ['name' => $skill['name']],
                    $skill
                );
            }

            return response()->json([
                "status" => "success",
                "message" => "Default skills seeded successfully!"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }
    }
}
