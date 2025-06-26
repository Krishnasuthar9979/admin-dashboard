<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        $customers = Customer :: all();
        $orders = DB::table('order')->get();

        $order_details = DB::table('order_detail')->get();
        return view('admin.bills.blist',compact('bills','customers','orders','order_details'));
    }
    public function create()
    {
        // Fetch the product by ID
        $customers = Customer :: all();
        $orders = DB::table('order')->get();
        $order_details = DB::table('order_detail')->get();   
         //dd($categories);
        return view('admin.bills.badd',compact('customers','orders','orderdetails'));
    }
    public function store(Request $request)
    {
        //  $request->validate([
        //     'subcategory_name' => 'required|string|max:255',
        //     'category_id' => 'required', 
        //     'description' => 'required|text', 
        // ]);

        //$validated['slug'] = Str::slug($validated['category_name']);
        $bill = new Bill();
        $bill->o_id = $request->o_id;
        $bill->c_id = $request->c_id;
        $bill->order_date = $request->order_date;
        $bill->delivery_date = $request->delivery_date;
        $bill->total_amount = $request->total_amount;
        $bill->od_id = $request->od_id;
        $bill->tax = $request->tax;
        $bill->discount = $request->discount;
        $bill->save();
        return redirect()->route('admin.dashboard')
            ->with('success', 'Bill created successfully.');
    }

    public function edit(string $bill_id){
        $customers = Customer :: all();
        $orders = DB::table('order')->get();
        $orderdetails = DB::table('order_detail')->get();
        $bills= DB :: table('bill')->where("bill_id",$bill_id)->firstOrFail();

        return view('admin.bills.bedit',compact('bills','customers','orders','orderdetails',));
    }

    public function update(Request $request,string $bill_id)
    {
        $bill = DB :: table('bill')->where('bill_id', $bill_id)->update([
            'o_id' => $request->o_id,
            'c_id' => $request->c_id,
            'order_date' => $request->order_date,
            'delivery_date' => $request->delivery_date,
            'total_amount' => $request->total_amount,
            'od_id' => $request->od_id,
            'tax' => $request->tax,
            'discount' => $request->discount,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Product Updated Successfully.');}
    // Delete a product
    public function destroy(string $bill_id)
    {
    $bills= DB::table('bill')->where('bill_id', $bill_id)->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Product Deleted Successfully.');
    }
}
