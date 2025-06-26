<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Prescription;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\Models\Bill;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        //disply list of employees:
        $employees = Employee :: all(); // Fetch all employees
        return view('admin.employees.emplist',['employees'=>$employees]); // Pass employees to the view
    }

    public function create(){
        return view('admin.employees.empadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'e_name' => 'required',
            'j_date' => 'required',
            'e_email' => 'required',
            'e_password' => 'required',
            'e_contact' => 'required',
            'schedule' => 'required',
            'role' => 'required',
        ]);
        $employees = new Employee();
        $employees ->e_name = $request -> e_name;
        $employees ->j_date = $request -> j_date;
        $employees ->e_email = $request -> e_email;
        $employees ->e_password = $request -> e_password;
        $employees ->e_contact = $request -> e_contact;
        $employees ->schedule = $request -> schedule;
        $employees ->role = $request -> role;
        $employees -> save();

        return redirect("admin/dashboard")->with('success', 'Employee Inserted Successfully.');
        //return response()->json(['success' => 'Employee added successfully!']);
    }

    public function show(string $id){
        //
    }

    public function edit(string $e_id){
         $employees = DB::table('employee')->where('e_id', $e_id)->first();
         $employees->j_date = Carbon::parse($employees->j_date);
         return view('admin.employees.empedit', ['employee'=>$employees]);
    }

    public function update(Request $request,string $e_id)
    {
        $employees = DB::table("employee")->where("e_id",$e_id)->update([
            'e_name' => $request -> e_name,
            'j_date' => $request -> j_date,
            'e_email' => $request -> e_email,
            'e_password' => $request -> e_password,
            'e_contact' => $request -> e_contact,
            'schedule' => $request -> schedule,
            'role' => $request -> role,
        ]);
    
        return redirect("admin/dashboard")->with('success', 'Employee Updated Successfully.');
         return response()->json(['success' => 'Employee updated successfully!']);
    }

    public function destroy(string $e_id)
    {
        DB::table("employee")->where("e_id",$e_id)->delete();
        return redirect("admin/employees/emplist")->with('danger', 'Employee Deleted Successfully.');
    }


    public function viewemployee(){
        $employees = Employee::all();      // Fetch all customers
     return view('employees.employees.emplist', ['employees'=>$employees]);  // Pass customers to the view

    }
    public function viewcustomer(){
        $customers = Customer::all();      // Fetch all customers
     return view('employees.customers.clist', ['customers'=>$customers]);  // Pass customers to the view

    }
    public function viewsupplier(){
        $suppliers = Supplier::all();      // Fetch all suppliers
        return view('employees.suppliers.slist', ['suppliers'=>$suppliers]);  // Pass suppliers to the view
    }
    public function viewPrescriptions(){
        $prescriptions = Prescription::all();      // Fetch all suppliers
        return view('employees.prescriptions.prelist', ['prescriptions'=>$prescriptions]);  // Pass suppliers to the view
    }
    public function vieworder(){
        $orders = Order::all();      // Fetch all customers
     return view('employees.orders.olist', ['orders'=>$orders]);  // Pass customers to the view
    }
    public function vieworderdetail(){
        $odetail = OrderDetail::all();      // Fetch all customers
       return view('employees.orderdetails.od_list', ['odetails'=>$odetail]);  // Pass customers to the view
    }
    public function viewshipping(){
        $shipping = Shipping::all();      // Fetch all customers
       return view('employees.shipping.shiplist', ['shipping'=>$shipping]);  // Pass customers to the view
    }
    public function viewbill(){
        $bills = Bill::all();      // Fetch all customers
       return view('employees.bills.blist', ['bills'=>$bills]);  // Pass customers to the view
    }
}
