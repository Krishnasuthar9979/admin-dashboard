<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Prescription;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of customers.
     */
    public function index()
    {    
        $orders = Order::with(['customer', 'prescription'])->get();
        $customers = Customer::all();
        $prescriptions = Prescription::all(); // This defines $prescriptions

        // Pass the variables to the view
        return view('admin.orders.olist', compact('orders', 'customers', 'prescriptions'));
    }

    /**
     * Store a newly created customer in storage.
     */

    //  public function create(){
    //     return view('admin.orders.oadd');
    // }

    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     // $request->validate([
    //     //     'o_date' => 'required|date',
    //     //     'o_amt' => 'required|integer|max:255',
    //     //     'c_id ' => 'required|integer|max:255',
    //     //     'prescription_id ' => 'integer|max:255',
    //     //     'o_status'  => 'required|string|max:20',
    //     // ]);

    //     // Add a new customer (manual property assignment)
    //     $order = new Order();
    //     $order->o_date = $request->o_date;
    //     $order->o_amt = $request->o_amt;
    //     $order->c_id = $request->c_id;
    //     $order->prescription_id = $request->prescription_id;
    //     $order->o_status =  $request->o_status;
    //     $order->save();

    //     return redirect()->route('admin.orders.olist')->with('success', 'Order added successfully!');
    // }

    // /**
    //  * Update the specified customer in storage.
    //  */
    // public function edit(string $o_id){
    //     $orders = DB::table("order")->where("o_id",$o_id)->first();
    //     $customers = Customer::all();
    //     $prescriptions = Prescription::all(); // This defines $prescriptions
    //     return view('admin.orders.oedit',['order'=>$orders,'customers'=>$customers,'prescriptions'=>$prescriptions]);
    // }
    public function edit(string $o_id)
    {
        // Fetch the order by ID
        $order = Order::with(['customer', 'prescription'])->where('o_id', $o_id)->first();
        if (!$order) {
            return redirect()->route('admin.orders.olist')->with('error', 'Order not found');
        }

        $customers = Customer::all();
        $prescriptions = Prescription::all(); // This defines $prescriptions

        return view('admin.orders.oedit', compact('order', 'customers', 'prescriptions'));
    }
    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, $o_id)
    {
        //Validate the request data
        $request->validate([
            'o_status'  => 'required|string|max:20',
        ]);
         $order = DB::table("order")->where("o_id",$o_id)->first();
         $order = new Order();
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        
        $orders = DB::table("order")->where("o_id",$o_id)->update([
            'o_date' => $request -> o_date,
            'o_amt' =>  $request -> o_amt,
            'prescription_id' => $request -> prescription_id,
            'c_id' => $request -> c_id,
            'o_status' => $request -> o_status,
            'created_at' => now()
        ]);


         return redirect()->route('admin.dashboard')->with('success', 'Order deleted successfully!');
    }

    /**
     * Remove the specified customer from storage.
     */
    // public function destroy(string $o_id)
    // {
    //     // Find and delete the customer
    //     DB::table("order")->where("o_id",$o_id)->delete();
    //     return redirect()->route('admin.dashboard')->with('success', 'Order deleted successfully!');
    // }
}
