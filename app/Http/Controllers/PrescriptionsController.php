<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionsController extends Controller
{
    public function index()
    {
        // $customers = Customer::all();
        // $prescriptions = Prescription :: with('customers')->get();
        // return view('admin.prescriptions.prelist',compact('prescriptions','customers'));
        $prescriptions = Prescription::with('customer')->get(); // Ensure 'customer' is singular
        return view('admin.prescriptions.prelist', compact('prescriptions'));
    }
    // public function create()
    // {
    //     $customers = Customer::all();
    //     return view('admin.prescriptions.preadd', compact('customers'));
    // }
    public function store(Request $request)
    {
        //  $request->validate([
        //     'subcategory_name' => 'required|string|max:255',
        //     'category_id' => 'required', 
        //     'description' => 'required|text', 
        // ]);

        //$validated['slug'] = Str::slug($validated['category_name']);
        $prescription = new Prescription();
        $prescription->left_sphere = $request->l_s;
        $prescription->left_cylinder = $request->l_c;
        $prescription->left_axis = $request->l_a;
        $prescription->right_sphere = $request->r_s;
        $prescription->right_cylinder = $request->r_c;
        $prescription->right_axis = $request->r_a ;
        $prescription->c_id = $request->c_id;
        $prescription->save();
        
        return redirect()->route('admin.prescriptions.prelist')
            ->with('success', 'Subcategory created successfully.');
    }
    // public function edit(string $prescription_id){
    //     $customers = Customer :: all();
    //     $prescriptions= DB :: table('prescription')->where("prescription_id",$prescription_id)->firstOrFail();
    //     return view('admin.prescriptions.preedit',['prescription'=>$prescriptions,'customers'=>$customers]);
    // }

    // public function update(Request $request,string $prescription_id)
    // {
    //    $prescriptions = DB::table('prescription')->where('prescription_id', $prescription_id)->update([
    //         'left_sphere' => $request->l_s,
    //         'left_cylinder'=> $request->l_c,
    //         'left_axis' => $request->l_a,
    //         'right_sphere' => $request->r_s,
    //         'right_cylinder' => $request->r_c,
    //         'right_axis' => $request->r_a,
    //         'c_id' => $request->c_id,
    //     ]);
    
    //     return redirect()->route('admin.prescriptions.prelist')->with('success', 'Product Updated Successfully.');
    // }
    // // Delete a product
    // public function destroy(string $prescription_id)
    // {
    // $prescriptions = DB::table('prescription')->where('prescription_id', $prescription_id)->delete();
    // return redirect()->route('admin.prescriptions.prelist')->with('success', 'Product Deleted Successfully.');
    // }
}



