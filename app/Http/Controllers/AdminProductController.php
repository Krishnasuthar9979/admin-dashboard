<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Frame;
use App\Models\Brand;
use App\Models\Prescription;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'frame', 'subcategory', 'brand', 'prescription'])->get();
        $categories = Category::all();
        //$frames=Product::with('frame')->get();
        $frames = Frame::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $prescriptions = Prescription::all();

        return view('admin.products.plist', compact('products', 'categories', 'frames', 'brands', 'subcategories', 'prescriptions'));
    }
    public function create()
    {
        $colors = [
            'Black' => 'black',
            'Brown' => 'brown',
            'Red' => 'red',
            'Yellow' => 'yellow',
            'Blue' => 'blue',
            'White' => 'white',
            'Green' => 'green',
            'Black-white' => 'black-white',
            'Pink-white' => 'pink-white',
            'Lightpink' => 'lightpink',
            'Lightgreen' => 'lightgreen',
        ];

        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $frames = Frame::all();
        $prescriptions = Prescription::all();
        return view('admin.products.padd', compact('brands', 'colors', 'categories', 'subcategories', 'frames', 'prescriptions'));
    }
    // Store a new product
    public function store(Request $request)
    {
        //     echo"store method";
        //  $request->validate([
        //      'p_name' => 'required|string|max:255',
        //      'price' => 'required|numeric',
        //      'size' => 'required|string',
        //      'color' => 'required|string',
        //      'qty' => 'required|integer',
        //      'p_image' => 'nullable|string|mimes:jpeg,png,jpg|max:2048',
        //      'category_id' => 'required|exists:category,category_id',
        //      'subcategory_id' => 'required|exists:sub_category,subcategory_id',
        //      'frame_id' => 'required|exists:frame,frame_id',
        //      'brand_id' => 'required|exists:brand,brand_id',
        //      'prescription_id' => $request->product_name == "Eyeglass" || $request->product_name == "Prescription Glass" ? 'required|integer' : 'nullable|integer',  
        //      'p_image.max' => 'The image size must not exceed 2MB.',
        //  ]);

        $product = new Product();
        $product->p_name = $request->p_name;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->qty = $request->qty;
        $product->description = $request->description;
        if ($request->hasFile('p_img')) {
            $image = $request->file('p_img');
            $p_image = time() . ' .' . $image->extension();
            $image->move(public_path('storage/products'), $p_image);
            $product->p_img = $p_image;
        } else {
            // $product -> p_img = null;
        }

        $product->subcategory_id = $request->subcategory_id != 0 ? $request->subcategory_id : null;
        $product->brand_id = $request->brand_id != 0 ? $request->brand_id : null;
        $product->frame_id = $request->frame_id != 0 ? $request->frame_id : null;
        $product->prescription_id = $request->prescription_id ?? null;
        // $product -> prescription_id = $request -> prescription_id ? $request -> prescription_id : null; 
        // Ensure this exists;
        if ($request->product_name == "Eyeglass" || $request->product_name == "Prescription Glass") {
            $product->prescription_id = $request->prescription_id;
        } else {
            $product->prescription_id = null;
        }
        $product->save();
        return redirect()->route('admin.dashboard')->with('success', 'Product Inserted Successfully.');
    }

    // Show form to edit an existing product
    public function edit(string $p_id)
    {

        $colors = [
            'Black' => 'black',
            'Brown' => 'brown',
            'Red' => 'red',
            'Yellow' => 'yellow',
            'Blue' => 'blue',
            'White' => 'white',
            'Green' => 'green',
            'Black-white' => 'black-white',
            'Pink-white' => 'pink-white',
            'Lightpink' => 'lightpink',
            'Lightgreen' => 'lightgreen',
        ];

        $categories = Category::all();
        $frames = Frame::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $prescriptions = Prescription::all();
        $products = DB::table('product')->where("p_id", $p_id)->firstOrFail();
        return view('admin.products.pedit', ['colors' => $colors, 'product' => $products, 'categories' => $categories, 'frames' => $frames, 'brands' => $brands, 'subcategories' => $subcategories, 'prescriptions' => $prescriptions]);
    }

    // Update a product's details
    public function update(Request $request, string $p_id)
    {
        $product = DB::table('product')->where('p_id', $p_id)->first();
        //$product = Product::findOr($p_id);

        if (!$product) {
            return back()->with('error', 'Product not found');
        }
        // if($request->hasFile('p_img')){
        //     $image=$request->file('p_img');
        //     $p_image = time().'.'.$image->extension();
        //     $image->move(public_path('storage/products'),$p_image);  
        //     $product -> p_img = $p_image; 
        // }

        if ($request->hasFile('p_img')) {
            // Upload new image
            $file = $request->file('p_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('storage/products', $filename);
            $product->p_img = $filename;
        } else {
            // Keep the old image
            $product->p_img = $request->input('old_p_img');
        }

        DB::table('product')->where('p_id', $p_id)->update([
            'p_name' => $request->p_name,
            'price' => $request->price,
            'size' => $request->size,
            'color' => $request->color,
            'qty' => $request->qty,
            'p_img' => $product->p_img ?? null, // Use the updated image or keep it null
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id ?? null,            // 'frame_id' => $request->input('frame_id') === 'NULL' || $request->input('frame_id') === '' ? null : $request->input('frame_id'),
            'frame_id' =>  $request->frame_id != 0 ? $request->frame_id : null,
            'prescription_id' => $request->prescription_id != 0 ? $request->prescription_id : null,
            'brand_id' => $request->brand_id != 0 ? $request->brand_id : null,
            'description' => $request->description ?? null,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Product Updated Successfully.');
    }
    // Delete a product
    public function destroy(string $p_id)
    {
        $products = DB::table('product')->where('p_id', $p_id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Product Deleted Successfully.');

        // return back()->with('error', 'Product not found');
    }
    public function search(Request $request)
    {
        // $search = $request->input('search');

        // $products = DB::table('product')
        // ->join('brand', 'product.brand_id', '=', 'brand.brand_id')
        //     ->select('product.*', 'brand.brand_name')
        //     ->when($search, function ($query, $search) {
        //         return $query->where('product.p_name', 'like', "%$search%")
        //                      ->orWhere('brand.brand_name', 'like', "%$search%");
        //     });
        //     // ->paginate(10); // Pagination optional

        // return view('admin.products.plist', compact('products', 'search'));
        $search = $request->input('search');

        $products = DB::table('product')
            ->join('brand', 'product.brand_id', '=', 'brand.brand_id')
            ->select('product.*', 'brand.brand_name')
            ->when($search, function ($query, $search) {
                return $query->where('product.p_name', 'like', "%$search%")
                    ->orWhere('brand.brand_name', 'like', "%$search%");
            })
            ->orderBy('product.p_id', 'desc')->get();

        return redirect()->route('admin.dashboard')->with('products', $products, 'search', $search)->with('success', 'Product Search Successfully.');
    }
    public function lowStock(){
    
        $lowStockProducts = Product::where('qty','<=' ,5)->paginate(4);
        return view('admin.products.lowstock', compact('lowStockProducts'));
    }

    public function outOfStock()
    {
        $outOfStockProducts = Product::where('qty', '=', 0)->paginate(4);
        return view('admin.products.outofstock', compact('outOfStockProducts'));
    }
}
