<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Complain;
use App\Models\Order;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function index()
    {
    //     $complains = DB::table('complain')
    //     ->join('order', 'complain.o_id', '=', 'order.o_id')
    //     ->select('complain.*', 'order.o_id')
    //     ->get();

    // return view('admin.complains.com_list',['complains'=> $complains]); // Pass purchase_products to the view
    $orders= Order::all();
    $compains = Complain ::with(['order']); // Fetch all purchase_products
    return view('admin.compains.com_list',compact('orders','complains'));
    }
}
