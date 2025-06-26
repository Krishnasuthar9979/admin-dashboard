<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();      // Fetch all customers
        return view('admin.customers.clist', ['customers'=>$customers]);  // Pass customers to the view
    }
    // public function create(){
    //     return view('admin.customers.cadd');
    // }

    // public function store(Request $request)
    // {
         // $request->validate([
        //     'c_name' => 'required|string|max:255',
        //     'c_email' => 'required|email|unique:customers,c_email',
        //     'c_password' => 'required|string|min:6|max:20',
        //     'c_gender' => 'required|in:male,female,other',
        //     'c_mobileno' => 'required|integer|max:20',
        //     'c_address' => 'required|string'
        // ]);

    //     $customer = new Customer();
    //     $customer->c_name = $request->c_name;
    //     $customer->c_email = $request->c_email;
    //     $customer->c_password = bcrypt($request->c_password);
    //     $customer->c_gender = $request->c_gender;
    //     $customer->c_mobileno = $request-> c_mobileno;
    //     $customer->c_address = $request->c_address;
    //     $customer->save();

    //     return redirect("admin/customers/clist")->with('success', 'Customer Inserted Successfully.');
    //     //return response()->json(['success' => 'Customer added successfully!']);
    // }

    // public function show(string $id){
    //     //
    // }

    public function edit(string $c_id){
         $customers = DB::table('customer')->where('c_id', $c_id)->first();
         return view('admin.customers.cedit', ['customer'=>$customers]);
    }

    public function update(Request $request,string $c_id)
    {
        $customers = DB::table("customer")->where("c_id",$c_id)->update([
            'c_name' => $request -> c_name,
            'c_email' => $request -> c_email,
            'c_password' => $request -> c_password,
            'c_gender' => $request -> c_gender,
            'c_mobileno' => $request -> c_mobileno,
            'c_address' => $request -> c_address,
        ]);
    
        return redirect("admin/dashboard")->with('success', 'Customer Updated Successfully.');
        //return redirect()->back()->with('success', 'Customer updated successfully!');
    }

    public function destroy(string $c_id)
    {
        DB::table("customer")->where("c_id",$c_id)->delete();
        return redirect("admin/dashboard")->with('danger', 'Customer Deleted Successfully.');
    }
}

