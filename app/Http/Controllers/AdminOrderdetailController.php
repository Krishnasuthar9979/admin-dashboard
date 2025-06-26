<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderdetailController extends Controller
{
    public function index()
    {    
        $orderDetails = OrderDetail:: all();
        $orders = Order::all();
        $products = Product::all();  //This defines $prescriptions

        return view('admin.orderdetails.od_list',['orderdetails'=>$orderDetails,'orders'=>$orders,'products'=>$products]);
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
    //     $request->validate([
    //         'o_id' => 'required|integer',
    //         'p_id' => 'required|integer|max:255',
    //         'price' => 'required|integer|max:255',
    //         'qty' => 'required|integer|max:255',
    //     ]);
    //     // Add a new customer (manual property assignment)
    //     $OrderDetail = new OrderDetail();
    //     $OrderDetail->o_id = $request->o_id;
    //     $OrderDetail->p_id = $request->p_id;
    //     $OrderDetail->price = $request->price;
    //     $OrderDetail->qty =  $request->qty;
    //     $OrderDetail->save();

    //     return redirect()->route('admin.orderdetails.index')->with('success', 'Orderdetail added successfully!');
    // }

    // /**
    //  * Update the specified customer in storage.
    //  */
    // public function update(Request $request, $od_id)
    // {
    //    // Validate the request data
    //    $request->validate([
    //     'o_id' => 'required|integer',
    //     'p_id' => 'required|integer|max:255',
    //     'price' => 'required|integer|max:255',
    //     'qty' => 'required|integer|max:255',
    // ]);

    //     // Find the customer and update (manual property assignment)
    //     $OrderDetail = OrderDetail::findOrFail($od_id);
    //     $OrderDetail->o_id = $request->o_id;
    //     $OrderDetail->p_id = $request->p_id;
    //     $OrderDetail->price = $request->price;
    //     $OrderDetail->qty =  $request->qty;
    //     $OrderDetail->save();

    //     return redirect()->route('admin.orderdetails.index')->with('success', 'Orderdetail updated successfully!');
    // }

    /**
     * Remove the specified customer from storage.
     */
    }
    public function destroy($od_id)
    {
        // Find and delete the customer
        DB::table("order_detail")->where("od_id",$od_id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Orderdetail deleted successfully!');
    }
}
