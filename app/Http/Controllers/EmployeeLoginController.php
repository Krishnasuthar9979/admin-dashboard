<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Support\Str;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class EmployeeLoginController extends Controller
{
    public function showLoginForm()
    {
        // // Return a view and pass the product to the view
         return view('employees.Loginemployee.login');
    }
     public function login(Request $request)
     {
         $request -> validate ([
            //'e_name' => 'required|string',
            'e_name' => 'required|string',            
            'e_password' => 'required|min:5', 
        ]);
      
         $employee = DB::table('employee')->where('e_name', $request->e_name)->first();

        if($employee && $employee->e_name === $request->e_name){
         if ($employee && $request->e_password === $employee->e_password) {
            // Store employee's ID in session
            Session::put('employee_id', $employee->e_id);
            Session::put('employee_name', $employee->e_name);
            Session::put('employee_pass', $employee->e_password);
            return redirect()->route('employees.dashboard');
        } 
    }
        else {
            // Authentication failed, redirect back with an error message
            return back()->withErrors(['e_name' => 'Invalid name','e_password' => 'Invalid password']);       
        }
     }

    public function dashboard(){
        // return redirect('employee/dashboard');
        if (Session::has('e_id')) {
            return view('employees.dashboard');
        } else {
            return redirect()->route('employees.Loginemployee.login');
        }
    }

    public function logout(Request $request)
    {
        Session::forget('employee_id');
        Session::forget('employee_email');
        return redirect('/employees/Loginemployee/login')->with('success', 'Logged out successfully.');
    }

    // public function changepass(){
    //     return redirect('employees/Loginemployee/changepass');
    // }
}
