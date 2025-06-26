<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
 use App\Models\Brand;
 use App\Models\Frame;
use App\Models\Product;
use App\Models\Order;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Complain;
use App\Models\Review_feedback;
use App\Models\Category;
use App\Models\Shipping;
use App\Models\Offer;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Prescription;
use App\Models\Supplier;
use App\Models\OrderDetail;
use App\Models\Purchase_product;
use App\Models\Subcategory;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
         $totalProducts = Product::count();
         $totalOrders = Order::count();
         $totalCategories = Category::count();
         $totalSubcategories = Subcategory :: count();
         $recentOrders = Order::latest()->take(2)->get();
         $totalOffers = Offer :: count();
         $totalCustomers = Customer :: count();
         $orders = Order::with('customer','orderdetails')->get();
         $customers = Customer::all(); // If needed elsewhere
         $offers = Offer :: all();
         $complains = Complain :: all();
         $brands = Brand :: all();
         $employees = Employee :: all();
         $shipping = Shipping :: all();
         $categories = Category :: all();
         $subcategories = Subcategory :: all();
         $purchase_products = Purchase_product :: all();
         $orderdetails = OrderDetail :: all();
         $frames = Frame :: all();
         $suppliers = Supplier :: all();
         $review_feedbacks = Review_feedback :: all();
         $products = Product :: all();
         $bills = Bill :: all();
         $prescriptions = Prescription :: all();
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

        return view('employees.dashboard',[
             'totalProducts'=> $totalProducts,
             'totalOrders'=> $totalOrders,
             'totalCategories'=> $totalCategories,
            'totalSubcategories'=> $totalSubcategories,
             'recentOrders'=> $recentOrders,
            'totalOffers'=>$totalOffers,
            'totalCustomers'=>$totalCustomers,
            'customers' => $customers,
            'suppliers'=>$suppliers,
            'orders'=> $orders,
            'offers'=> $offers,
            'brands'=>$brands,
            'employees'=>$employees,
            'shipping'=>$shipping,
            'complains'=>$complains,
            'categories' =>$categories, 
            'rfs' => $review_feedbacks,
            'subcategories' => $subcategories,
            'purchase_products' => $purchase_products,
            'orderdetails' => $orderdetails,
            'frames' => $frames,
            'products' => $products,
            'colors' => $colors,
            'bills' => $bills,
            'prescriptions'=>$prescriptions,
            'admin'=> $admin,
        ]);
    }
}
