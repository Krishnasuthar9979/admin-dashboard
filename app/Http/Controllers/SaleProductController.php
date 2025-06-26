<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\SaleProduct;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SaleProductController extends Controller
{
    public function index()
    {
        
        $saleproducts = DB::table('saleproduct')
        ->join('product', 'saleproduct.p_id', '=', 'product.p_id')
        ->join('customer', 'saleproduct.c_id', '=', 'customer.c_id')
        ->select('saleproduct.*', 'product.p_name', 'customer.c_name')
        ->get();

        
        return view('admin.sale_products.salepro_list',['saleproducts'=> $saleproducts]); // Pass purchase_products to the view
    }
    public function sale_report(){
        $product = Product::all();
        $customer = Customer::all();

        $saleproducts = DB::table('saleproduct')
        ->join('product', 'saleproduct.p_id', '=', 'product.p_id')
        ->join('customer', 'saleproduct.c_id', '=', 'customer.c_id')
        ->select(
            'saleproduct.*',
            'product.p_name as p_name',
            'customer.c_name as c_name'
        )
        ->get();
        return view('admin.sale_products.sale_report', compact('saleproducts', 'product', 'customer'));

    }
    public function sale_search(Request $request){
        $search = $request->input('search'); // safe way to get input

        $saleproducts = DB::table('saleproduct')
            ->join('product', 'saleproduct.p_id', '=', 'product.p_id')
            ->join('customer', 'saleproduct.c_id', '=', 'customer.c_id')
            ->select('saleproduct.*',
            'product.p_name as p_name',
            'customer.c_name as c_name'
        );

        if (!empty($search)) {
            $saleproducts = $saleproducts->where(function ($query) use ($search) {
                $query->where('product.p_name', 'like', "%{$search}%")
                      ->orWhere('customer.c_name', 'like', "%{$search}%")
                      ->orWhere('saleproduct.sale_product_id', 'like', "%{$search}%")
                      ->orWhere('saleproduct.date', 'like', "%{$search}%")
                      ->orWhere('saleproduct.qty', 'like', "%{$search}%")
                      ->orWhere('saleproduct.price', 'like', "%{$search}%");
            });
        }

        $saleproducts = $saleproducts->get();
        //  dd($saleproducts);
        return view('admin.sale_products.sale_report',compact('saleproducts')); // Pass purchase_products to the view
    }
    public function exportPDF(){
        $saleproducts = DB::table('saleproduct')
        ->join('product', 'saleproduct.p_id', '=', 'product.p_id')
        ->join('customer', 'saleproduct.c_id', '=', 'customer.c_id')
        ->select('saleproduct.*', 'product.p_name', 'customer.c_name')
        ->get();
         $pdf = FacadePdf :: loadView('admin.sale_products.sale_report', ['saleproducts' => $saleproducts]);
         return $pdf->download('sale_report.pdf');
    }
}
