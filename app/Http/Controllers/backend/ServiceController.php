<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;
use PHPUnit\Exception;

class ServiceController extends Controller
{
    public function index ()
    {
        return view('backend.content.service.service-list');
    }
    public function list ()
    {
        return view('backend.content.service.service-add');
    }
    public function create ()
    {
        return view('backend.content.service.service-add');
    }
    public function store (Request $request): JsonResponse
    {
        try {
//            dd($request->all());
            $validate=$request->validate([
                "title" => "required|string",
                "description" => "nullable|string",
                "image" => "nullable|file|mimes:jpg,jpeg,png|max:2048",
                "icon" => "nullable|file|mimes:jpg,jpeg,png|max:2048"
            ]);
            $service = new Service();
            $service->title=$validate['title'];
            $service->description=$validate['description'];
            $imageFile = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageFile =  date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->move("service/", $imageFile);
            }
//            dd($imageFile);
            $iconFile = null;
            if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $iconFile = date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->move("service/", $iconFile);
            }
            $service->image = $imageFile;
            $service->icon = $iconFile;
            $service->save();
            return response()->json(["status"=>"success", "message"=>"Service Create Success!"]);
        } catch (Exception $e) {
            return response()->json(["status" => "Fail", "message" => $e->getMessage()]);
        } catch (ValidationException $exception){
            return response()->json(["status" => "Fail", "message" => $exception->getMessage()]);
        }
    }


}
