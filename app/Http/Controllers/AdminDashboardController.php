<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Frame;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review_feedback;
use App\Models\SaleProduct;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Shipping;
use App\Models\Offer;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Prescription;
use App\Models\Complain;
use App\Models\Supplier;
use App\Models\OrderDetail;
use App\Models\Purchase_product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $lowStockProducts = Product::where('qty', '<=', 5)->get();
        $outOfStockCount = Product::where('qty', '=', 0)->count();
        $totalProducts = Product::count();
         $totalOffers = Offer :: count();
         $totalOrders = Order::count();
         $totalCategories = Category::count();
         $totalSubcategories = Subcategory :: count();
         $recentOrders = Order::latest()->take(2)->get();
         $totalOffers = Offer :: count();
         $totalCustomers = Customer :: count();
         $orderdetails = OrderDetail ::with(['product'])->get();
         $products = Product :: all();
         $customers = Customer::all(); // If needed elsewhere
        //  $product = DB :: table('product');
         $customer = DB :: table('customer');
         $orders = Order::with(['customer','orderDetails.product'])->get();
         $offers = Offer :: all();
         $brands = Brand :: all();
         $employees = Employee :: all();
         $shipping = Shipping :: all();
         $categories = Category :: all();
         $subcategories = Subcategory :: all();
         $purchase_products = Purchase_product :: all();
         $frames = Frame :: all();
         $suppliers = Supplier :: all();
         $bills = Bill :: all();
         $prescriptions = Prescription :: all();
         $saleproducts = DB::table('saleproduct')
         ->join('product', 'saleproduct.p_id', '=', 'product.p_id')
         ->join('customer', 'saleproduct.c_id', '=', 'customer.c_id')
         ->select('saleproduct.*', 'product.p_name', 'customer.c_name')
         ->get();
         
         $review_feedbacks = Review_feedback :: all();
         $complains = Complain :: all();
         $admin = Admin :: first();

         $colors = [
            'Black'=>'black',
            'Brown'=>'brown',
            'Red'=>'red',
            'Yellow'=>'yellow',
            'Blue'=>'blue',
            'White'=>'white',
            'Green'=>'green',
            'Black-white'=>'Black-white',
            'Pink-white'=>'pink-white',
            'Lightpink'=>'lightpink',
            'Lightgreen'=>'lightgreen',
        ]; 

        return view('admin.dashboard',[
             'totalProducts'=> $totalProducts,
             'totalOffers'=>$totalOffers,
             'totalOrders'=> $totalOrders,
             'totalCategories'=> $totalCategories,
            'totalSubcategories'=> $totalSubcategories,
             'recentOrders'=> $recentOrders,
            'totalOffers'=>$totalOffers,
            'totalCustomers'=>$totalCustomers,
            'customers' => $customers,
            'suppliers'=>$suppliers,
            'orders' => $orders,
            'offers'=> $offers,
            'brands'=>$brands,
            'employees'=>$employees,
            'shipping'=>$shipping,
            'categories' =>$categories, 
            'subcategories' => $subcategories,
            'purchase_products' => $purchase_products,
            'rfs' => $review_feedbacks,
            'complains' => $complains,
            'saleproducts' => $saleproducts,
            'orderdetails' => $orderdetails,
            'frames' => $frames,
            'products' => $products,
            'customer'=>$customer,
            'colors' => $colors,
            'bills' => $bills,
            'prescriptions'=>$prescriptions,
            'admin'=> $admin,
            'lowStockProducts' => $lowStockProducts,
            'outOfStockCount' => $outOfStockCount
        ]);
    }
}