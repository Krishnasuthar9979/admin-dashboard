<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Frame;
use App\Models\Brand;
use App\Models\Gender;

class AdminCategoryController extends Controller
{
    public function index()
    {
        //disply list of categories:
        $categories = Category ::all(); // Fetch all categories
        return view('admin.categories.catlist',['categories'=>$categories]); // Pass categories to the view
    }

    public function create(){
        return view('admin.categories.catadd');
    }

    public function store(Request $request)
    {
        $categories = new Category();
        $categories ->category_name = $request -> category_name;
        $categories ->description = $request -> description;
        $categories -> save();

        return redirect("admin/dashboard")->with('success', 'Category Inserted Successfully.');
        //return response()->json(['success' => 'Category added successfully!']);
    }

    public function show(string $id){
        
    }

    public function edit(string $category_id){
         $categories = DB::table('category')->where('category_id', $category_id)->first();

         return view('admin.categories.catedit', ['category'=>$categories]);
    }

    public function update(Request $request,string $category_id)
    {
        $categories = DB::table("category")->where("category_id",$category_id)->update([
            'category_name' => $request -> category_name,
            'description' => $request -> description,
        ]);
    
        return redirect("admin/dashboard")->with('success', 'Category Updated Successfully.');
        //  return response()->json(['success' => 'Category updated successfully!']);
    }

    public function destroy(string $category_id)
    {
        DB::table("category")->where("category_id",$category_id)->delete();
        return redirect("admin/dashboard")->with('danger', 'Category Deleted Successfully.');
    }
}