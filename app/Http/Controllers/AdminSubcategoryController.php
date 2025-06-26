<?php

namespace App\Http\Controllers;
use Symfony\Component\Routing\Annotation\Route;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSubcategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory :: with(['category'])->get();
        return view('admin.subcategories.subcate_list',compact('subcategories','categories'));
    }
    public function create()
    {
        // Fetch the product by ID
         $categories = Category:: all();
        //dd($categories);
        return view('admin.subcategories.subcate_add',compact('categories'));
    }
    public function store(Request $request)
    {
        //  $request->validate([
        //     'subcategory_name' => 'required|string|max:255',
        //     'category_id' => 'required', 
        //     'description' => 'required|text', 
        // ]);

        //$validated['slug'] = Str::slug($validated['category_name']);
        $subcategory = new Subcategory();
        $subcategory->subcategory_name = $request->subcate_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->description = $request->description;

        $subcategory->save();
        
        return redirect()->route('admin.dashboard')
            ->with('success', 'Subcategory created successfully.');
    }

    public function edit(string $subcategory_id){
        $categories = Category :: all();
        $subcategories= DB :: table('sub_category')->where("subcategory_id",$subcategory_id)->firstOrFail();
        return view('admin.subcategories.subcate_edit',['sub_category'=>$subcategories,'categories'=>$categories]);
    }

    public function update(Request $request,string $subcategory_id)
    {
       $subcategories= DB::table('sub_category')->where('subcategory_id', $subcategory_id)->update([
            'subcategory_name' => $request->subcate_name,
            'category_id'=> $request->cate_id,
            'description' => $request->description,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Product Updated Successfully.');
    }
    // Delete a product
    public function destroy(string $subcategory_id)
    {
    $subcategories= DB::table('sub_category')->where('subcategory_id', $subcategory_id)->delete();
    return redirect()->route('admin.dashboard')->with('success', 'Product Deleted Successfully.');
    }
}
