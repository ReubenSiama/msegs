<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\District;
use App\Models\DistrictManager;
use App\Models\MaterialRequest;
use App\Models\MaterialInfo;
use Illuminate\Support\Str;
use App\Models\User;

class DashboardController extends Controller
{
    public function getHome()
    {
        return view('home');
    }

    public function getManagers()
    {
        $managers = DistrictManager::get();
        $districts = District::get();
        return view('district-manager', compact('managers', 'districts'));
    }

    public function addDistrictManager(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 2;
        $user->save();
        $districtManager = new DistrictManager;
        $districtManager->user_id = $user->id;
        $districtManager->district_id = $request->district_id;
        $districtManager->save();
        return back()->withSuccess('District Manager Added');
    }
    
    public function getSupplier()
    {
        $suppliers = Supplier::get();
        return view('supplier', compact('suppliers'));
    }

    public function getAddSupplier()
    {
        return view('add-supplier');
    }

    public function addSupplier(Request $request)
    {
        $supplier = new Supplier;
        $supplier->code = "SUP".sprintf("%04d", mt_rand(1, 9999));
        $supplier->name = $request->name;
        $supplier->address_1 = $request->address_line_1;
        $supplier->address_2 = $request->address_line_2;
        $supplier->postal_code = $request->postal_code;
        $supplier->contact_no = $request->contact_no;
        
        if($supplier->save()){
            return back()->withSuccess('Supplier Added');
        }else{
            return back()->withError('Oops! Something Went Wrong')->withInput();
        }
    }

    public function editSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('edit-supplier',compact('supplier'));
    }

    public function updateSupplier($id, Request $request)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->name = $request->name;
        $supplier->address_1 = $request->address_line_1;
        $supplier->address_2 = $request->address_line_2;
        $supplier->postal_code = $request->postal_code;
        $supplier->contact_no = $request->contact_no;
        
        if($supplier->save()){
            return back()->withSuccess('Supplier Updated');
        }else{
            return back()->withError('Oops! Something Went Wrong')->withInput();
        }
    }

    public function deleteSupplier(Request $request)
    {
        Supplier::findOrFail($request->id)->delete();
        return back()->withSuccess('Supplier Deleted');
    }

    public function getMaterial()
    {
        $materials = MaterialInfo::get();
        return view('material', compact('materials'));
    }

    public function getAddMaterial()
    {
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('add-material', compact('categories', 'suppliers'));
    }

    public function addMaterial(Request $request)
    {
        $material = new MaterialInfo;
        $material->material_code = sprintf("%06d", mt_rand(1, 999999));
        $material->category_id = $request->category;
        $material->name = $request->material_name;
        $material->working_status = $request->working_status;
        $material->serial_number = $request->serial_number;
        $material->manufacturer = $request->manufacturer;
        $material->color = $request->color;
        $material->purchase_date = $request->purchase_date;
        $material->purchase_price = $request->purchase_price;
        $material->current_value = $request->current_value;
        $material->issue_date = $request->issue_date;
        $material->total_expense = $request->total_expense;
        $material->last_deprication = $request->last_deprication;
        $material->deprication_rate = $request->deprication_rate;
        $material->supplier_id = $request->supplier_id;
        if($material->save()){
            return redirect('/materials')->withSuccess('New Material Added');
        }else{
            return back()->withError('Something Went Wrong')->withInput();
        }
    }

    public function editMaterial($id)
    {
        $material = MaterialInfo::findOrFail($id);
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('edit-material', compact('material', 'categories', 'suppliers'));
    }

    public function updateMaterial($id, Request $request)
    {
        $material = MaterialInfo::findOrFail($id);
        $material->category_id = $request->category;
        $material->name = $request->material_name;
        $material->working_status = $request->working_status;
        $material->serial_number = $request->serial_number;
        $material->manufacturer = $request->manufacturer;
        $material->color = $request->color;
        $material->purchase_date = $request->purchase_date;
        $material->purchase_price = $request->purchase_price;
        $material->current_value = $request->current_value;
        $material->issue_date = $request->issue_date;
        $material->total_expense = $request->total_expense;
        $material->last_deprication = $request->last_deprication;
        $material->deprication_rate = $request->deprication_rate;
        $material->supplier_id = $request->supplier_id;
        if($material->save()){
            return redirect('/materials')->withSuccess('Material Updated');
        }else{
            return back()->withError('Something Went Wrong')->withInput();
        }
    }

    public function deleteMaterial(Request $request)
    {
        MaterialInfo::findOrFail($request->id)->delete();
        return back()->withSuccess('Deleted');
    }

    public function getPurchasingManager()
    {
        $users = User::where('role_id',1)->get();
        return view('purchasing-manager', compact('users'));
    }

    public function addPurchasingManager(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 1;
        $user->save();
        return back()->withSuccess('New Purchasing Manager Added');
    }


    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function addCategories(Request $request)
    {
        $category = new Category;
        $category->code = sprintf("%06d", mt_rand(1, 999999));
        $category->name = $request->name;
        $category->save();
        return back()->withSuccess('Category Added');
    }

    public function getMaterialRequests()
    {
        $materialRequests = MaterialRequest::get();
        return view('material-requests', compact('materialRequests'));
    }

    public function getRequestedMaterial($id)
    {
        $requested = MaterialRequest::findOrFail($id);
        $category = Category::findOrFail($requested->materialInfo->category_id);
        $countingIdle = MaterialInfo::where('working_status', 'Idle')->where('category_id',$category->id)->count();
        return view('view-requested-material',compact('requested', 'category', 'countingIdle'));
    }

    public function allocateMaterial($id, Request $request)
    {
        $requested = MaterialRequest::findOrFail($id);
        $requested->status = "Received";
        $requested->allocated_material_id = $request->material_id;
        $requested->save();

        $material = MaterialInfo::findOrFail($request->material_id);
        $material->working_status = "Working";
        $material->material_request_id = $requested->id;
        $material->save();
        return back();
    }

    public function processRequest($id)
    {
        $requested = MaterialRequest::findOrFail($id);
        $requested->status = "Processing";
        $requested->save();
        return back();
    }
}
