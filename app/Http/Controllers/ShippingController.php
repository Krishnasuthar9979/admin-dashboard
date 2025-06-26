<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Shipping;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class ShippingController extends Controller
{
    public function index()
    {    
        $shipping = Shipping:: all();
        $employees =Employee ::all();
        $customers = Customer ::all();
        $order_details = OrderDetail::all();
        return view('admin.shipping.shiplist',['shipping'=>$shipping,'employees'=>$employees,'order_details'=>$order_details,'customers'=>$customers]);
    }

    /**
     * Store a newly created customer in storage.
     */
    public function create(){
        return view('admin.shipping.shipadd');
    }
    public function store(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //      'od_id' => 'required|exists:order_detail,od_id', // Validate od_id
        //      'e_id' => 'required|integer|max:255',
        //      'c_id' => 'required|integer|max:255',
        //      'ship_address' => 'required|string|max:255',
        //      'city' => 'required|string|max:255',
        //      'area' => 'required|string|max:255',
        //      'pincode' => 'required|integer|max:255',
        // ]);
         // Add a new customer (manual property assignment)
         $shipping = new shipping();
         $shipping->e_id = $request->e_id;
         $shipping->c_id = $request->c_id;
         $shipping->od_id = $request->od_id;
         $shipping->ship_address = $request->ship_address;
         $shipping->city = $request->city;
         $shipping->area = $request->area;
         $shipping->pincode = $request->pincode;

         $shipping->save();

         return redirect()->route('admin.dashboard')->with('success', 'shipping added successfully!');
     }
     public function edit(string $ship_id){
        $employees = Employee :: all();
        $order_details = OrderDetail :: all();
        $customers = Customer :: all();
        $products = Product :: all();
        $shipping= DB :: table('shipping')->where("ship_id",$ship_id)->firstOrFail();
        return view('admin.shipping.shipedit',['shipping'=>$shipping,'employees'=>$employees,'orderdetails'=>$order_details,'products'=>$products,'customers'=>$customers]);
    // /**
    //  * Update the specified customer in storage.
    //  */
     }
     public function update(Request $request, $ship_id)
     {
        // Validate the request data
    //     $request->validate([
    //      'o_id' => 'required|integer',
    //      'p_id' => 'required|integer|max:255',
    //      'price' => 'required|integer|max:255',
    //      'qty' => 'required|integer|max:255',
    //  ]);

     $shipping = DB::table("shipping")->where("ship_id",$ship_id)->update([
        'e_id' => $request -> e_id,
        'od_id' => $request -> od_id,
        'ship_address' => $request -> ship_address,
        'city' => $request -> city,
        'area' => $request -> area,
        'pincode' => $request -> pincode,
        'c_id' => $request -> c_id,
    ]);

    return redirect("admin/dashboard")->with('success', 'Purchase_product Updated Successfully.');
     return response()->json(['success' => 'Purchase_product updated successfully!']);

    /**
     * Remove the specified customer from storage.
     */
    }
    public function destroy($ship_id)
    {
        // Find and delete the customer
        DB::table("shipping")->where("ship_id",$ship_id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'shipping deleted successfully!');
    }
}

