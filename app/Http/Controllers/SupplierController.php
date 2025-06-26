<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();      // Fetch all suppliers
        return view('admin.suppliers.slist', ['suppliers'=>$suppliers]);  // Pass suppliers to the view
    }
     public function create(){
         return view('admin.suppliers.sadd');
     }

     public function store(Request $request)
     {
         // $request->validate([
        //     's_name' => 'required|string|max:255',
        //     's_email' => 'required|email|unique:suppliers,s_email',
        //     's_password' => 'required|string|min:6|max:20',
        //     's_gender' => 'required|in:male,female,other',
        //     's_mobileno' => 'required|integer|max:20',
        //     's_address' => 'required|string'
        // ]);

         $supplier = new Supplier();
         $supplier->s_name = $request->s_name;
         $supplier->s_address = $request->s_address;
         $supplier->s_contact = $request-> s_contact;
         $supplier->s_email = $request->s_email;
         $supplier->s_gstno = $request->s_gstno;
        
         $supplier->save();

         return redirect("admin/dashboard")->with('success', 'Supplier Inserted Successfully.');
    //     //return response()->json(['success' => 'Supplier added successfully!']);
     }

    // public function show(string $id){
    //     //
    // }

    public function edit(string $s_id){
         $suppliers = DB::table('supplier')->where('s_id', $s_id)->first();
         return view('admin.suppliers.sedit', ['supplier'=>$suppliers]);
    }

    public function update(Request $request,string $s_id)
    {
        $suppliers = DB::table("supplier")->where("s_id",$s_id)->update([
            's_name' => $request -> s_name,
            's_address' => $request -> s_address,
            's_contact' => $request -> s_contact,
            's_email' => $request -> s_email,
            's_gstno' => $request -> s_gstno,
        ]);
    
        return redirect("admin/dashboard")->with('success', 'Supplier Updated Successfully.');
        //return redirect()->back()->with('success', 'Supplier updated successfully!');
    }

    public function destroy(string $s_id)
    {
        DB::table("supplier")->where("s_id",$s_id)->delete();
        return redirect("admin/dashboard")->with('danger', 'Supplier Deleted Successfully.');
    }
}
