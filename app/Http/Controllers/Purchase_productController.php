<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase_product;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class Purchase_productController extends Controller
{
    public function index()
    {
        //disply list of purchase_products:
        $products= Product::all();
        $suppliers= Supplier::all();
        $purchase_products = Purchase_product ::all(); // Fetch all purchase_products
        return view('admin.purchase_products.purpro_list',['purchase_products'=>$purchase_products,'products'=>$products,'suppliers'=>$suppliers]); // Pass purchase_products to the view
    }

    public function purchase_search(Request $request){
        $search = $request->input('search'); // safe way to get input
        // dd($search);

        $purchaseproducts = DB::table('purchase_product')
            ->join('product', 'purchase_product.p_id', '=', 'product.p_id')
            ->join('supplier', 'purchase_product.s_id', '=', 'supplier.s_id')
            ->select('purchase_product.*', 'product.p_name', 'supplier.s_name');
    
        if (!empty($search)){
            $purchase_products = $purchaseproducts->where(function ($query) use ($search) {
                $query->where('product.p_name', 'like', "%{$search}%")
                      ->orWhere('supplier.s_name', 'like', "%{$search}%")
                      ->orWhere('purchase_product.supplier_pid', 'like', "%{$search}%")
                      ->orWhere('purchase_product.qty', 'like', "%{$search}%")
                      ->orWhere('purchase_product.price', 'like', "%{$search}%");
            });
        }   

        $purchase_products = $purchaseproducts->get();
        
         return view('admin.purchase_products.purpro_list',compact('purchase_products')); // Pass purchase_products to the view
    }

    // public function store(Request $request)
    // {
    //     $purchase_products = new Purchase_product();
    //     $purchase_products ->s_id = $request -> s_id;
    //     $purchase_products ->p_id = $request -> p_id;
    //     $purchase_products ->qty = $request -> qty;
    //     $purchase_products ->price = $request -> price;
    //     $purchase_products -> save();

    //     return redirect("admin/purchase_products/purpro_list")->with('success', 'Purchase_product Inserted Successfully.');
    //     //return response()->json(['success' => 'Purchase_product added successfully!']);
    // }

    // public function show(string $id){
    //     //
    // }

    // public function edit(string $supplier_pid){
    //      $purchase_products = DB::table('purchase_product')->where('supplier_pid', $supplier_pid)->first();

    //      return view('admin.purchase_products.purpro_edit', ['purchase_product'=>$purchase_products]);
    // }

    // public function update(Request $request,string $supplier_pid)
    // {
    //     $purchase_products = DB::table("purchase_product")->where("supplier_pid",$supplier_pid)->update([
    //         'supplier_pid' => $request -> supplier_pid,
    //         's_id' => $request -> s_id,
    //         'p_id' => $request -> p_id,
    //         'qty' => $request -> qty,
    //         'price' => $request -> price,
    //     ]);
    
    //     return redirect("admin/purchase_products/purpro_list")->with('success', 'Purchase_product Updated Successfully.');
    //      return response()->json(['success' => 'Purchase_product updated successfully!']);
    // }

    public function destroy(string $supplier_pid)
    {
        DB::table("purchase_product")->where("supplier_pid",$supplier_pid)->delete();
        return redirect("admin/dashboard")->with('danger', 'Purchase_product Deleted Successfully.');
    }
}
