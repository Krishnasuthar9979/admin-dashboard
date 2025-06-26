<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        //disply list of brands:
        $brands = Brand ::all(); // Fetch all brands
        return view('admin.brands.brandlist',['brands'=>$brands]); // Pass brands to the view
    }

    public function create(){
        return view('admin.brands.brandadd');
    }

    public function store(Request $request)
    {
        $brands = new Brand();
        $brands ->brand_name = $request -> brand_name;
        $brands -> save();

        return redirect("admin/dashboard")->with('success', 'Brand Inserted Successfully.');
        //return response()->json(['success' => 'Brand added successfully!']);
    }

    public function show(string $id){
        //
    }

    public function edit(string $brand_id){
         $brands = DB::table('brand')->where('brand_id', $brand_id)->first();

         return view('admin.brands.brandedit', ['brand'=>$brands]);
    }

    public function update(Request $request,string $brand_id)
    {
        $brands = DB::table("brand")->where("brand_id",$brand_id)->update([
            'brand_name' => $request -> brand_name,
        ]);
    
        return redirect("admin/dashboard")->with('success', 'Brand Updated Successfully.');
         return response()->json(['success' => 'Brand updated successfully!']);
    }

    public function destroy(string $brand_id)
    {
        DB::table("brand")->where("brand_id",$brand_id)->delete();
        return redirect("admin/dashboard")->with('danger', 'Brand Deleted Successfully.');
    }
}
