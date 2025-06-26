<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeProfileController extends Controller
{
    public function index()
    {
        $e_id = session('employee_id'); // Get employee ID from session 
        $employee = Employee::where('e_id', $e_id)->first();
    
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Session expired. Please login again.');
        }
        return view('employees.profile',['employee'=>$employee]);  // Pass admins to the view.
    }
    public function edit(string $e_id){
        if (!session()->has('employee_id')) {
            return back()->withHeaders(['error' => 'Unauthorized access.']);
        }
        $employee = DB::table('employee')->where('e_id', $e_id)->first();
        return view('employees.empedit', ['employee'=>$employee]);
   }

   public function update(Request $request,string $e_id)
   {
        if (!session()->has('employee_id')) {
            return back()->with(['alert-type'=>'alert-danger','alert'=>'Unauthorized access.Login first.']);
        }
       $employees = DB::table("employee")->where("e_id",$e_id)->update([
           'e_name' => $request -> e_name,
           'e_email' => $request -> e_email,
           'e_password' => $request -> e_password,
           'e_contact' => $request -> e_contact,
       ]);
   
       return redirect("employees/dashboard")->with('success', 'Employee Updated Successfully.');
   }
}
