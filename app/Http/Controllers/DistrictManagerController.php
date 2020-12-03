<?php

namespace App\Http\Controllers;

use App\Models\MaterialRequest;
use Illuminate\Http\Request;
use App\Models\MaterialInfo;
use App\Models\Category;
use App\Models\DistrictManager;
use App\Models\District;
use Auth;

class DistrictManagerController extends Controller
{
    public function requestMaterial()
    {
        $materials = MaterialInfo::get();
        $categories = Category::get();
        $districts = District::get();
        return view('district-manager.request-material', compact('categories', 'materials', 'districts'));
    }

    public function postRequestMaterial(Request $request)
    {
        $manager = DistrictManager::where('user_id', Auth::user()->id)->first();
        $requestMaterial = new MaterialRequest;
        $requestMaterial->district_manager_id = $manager->id;
        $requestMaterial->material_id = $request->material;
        $requestMaterial->district_id = $request->district;
        $requestMaterial->location = $request->location;
        $requestMaterial->save();
        return back()->withSuccess('Material Request Submitted');
    }

    public function getAllocatedMaterials()
    {
        $districtManager = DistrictManager::where('user_id',Auth::user()->id)->first();

        $requestedMaterials = MaterialRequest::where('district_manager_id', $districtManager->id)->where('status','Received')->get();
        return view('allocated-material', compact('requestedMaterials'));
    }

    public function unallocateMaterial($id)
    {
        $requested = MaterialRequest::findOrFail($id);
        $requested->status = "Complete";
        $requested->allocated_material_id = null;
        $requested->save();

        $material = MaterialInfo::findOrFail($requested->material_id);
        $material->working_status = "Idle";
        $material->material_request_id = null;
        $material->save();
        return back();
    }
}
