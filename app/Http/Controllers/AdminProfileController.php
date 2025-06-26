<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::first();      // Fetch first row.
        return view('admin.adminlist',['admin'=>$admin]);  // Pass admins to the view.
    }

    public function show(string $id){
        //
    }

    public function edit(string $a_id){
        // if (!session()->has('admin_id')) {
        //     return redirect('/admin/Loginadmin/login')->with(['alert-type'=>'alert-primary','alert'=>'Unauthorized access.Login first.']);
        // }
         $admin = DB::table('admin')->where('a_id', $a_id)->first();
         return view('admin.adminedit', ['admin'=>$admin]);
    }

    public function update(Request $request,string $a_id)
    {
        if (!session()->has('admin_id')) {
            return back()->with(['alert-type'=>'alert-danger','alert'=>'Unauthorized access.Login first.']);
        }
        $admins = DB::table("admin")->where("a_id",$a_id)->update([
            'a_name' => $request -> a_name,
            'a_email' => $request -> a_email,
            'a_password' => $request -> a_password,
            'a_mobileno' => $request -> a_mobileno,
        ]);
    
        return redirect("admin/adminlist")->with('success', 'Admin Updated Successfully.');
        //return redirect()->back()->with('success', 'Admin updated successfully!');
    }
}
