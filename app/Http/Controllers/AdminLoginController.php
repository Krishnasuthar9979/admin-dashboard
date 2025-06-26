<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminLoginNotification;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        // // Return a view and pass the product to the view
         return view('admin.Loginadmin.login');
    }
     public function login(Request $request)
     {
         $request -> validate ([
            'a_name' => 'required|string',
            //'a_email' => 'required|text',            
            'a_password' => 'required|string|min:5', 
        ]);
      
        $admin = DB::table('admin')->where('a_name', $request->a_name)->first();

        if($admin && $admin->a_name === $request->a_name){
            if ($request->a_password === $admin->a_password) {
            // Store admin's ID in session
            Session::put('admin_id', $admin->a_id);
            Session::put('admin_name', $admin->a_name);
            Session::put('admin_pass', $admin->a_password);
            Mail::to('sutharkrishna011@gmail.com')->send(new AdminLoginNotification($admin));
            return redirect()->route('admin.dashboard');
        } 
        }
        else {
            // Authentication failed, redirect back with an error message
            if ($request->a_name !== $admin->a_name) {
                return back()->withErrors(['a_name' => 'Invalid credentials name']);
            }
            if ($request->a_password != $admin->a_password) {
                return back()->withErrors(['a_password' => 'Invalid credentials password']);
            }
            // If both name and password are incorrect
            return back()->withErrors(['a_name' => 'Invalid credentials name','a_password' => 'Invalid credentials password']);       
        }
     }

    public function dashboard(){
        // return redirect('admin/dashboard');
        if (Session::has('admin_id')) {
            return view('admin.dashboard');
        } else {
            return redirect()->route('admin.Loginadmin.login');
        }
    }

    public function logout(Request $request)
    {
        Session::forget('admin_id');
        Session::forget('admin_name');
        return redirect('/admin/Loginadmin/login')->with('success', 'Logged out successfully.');
    }

    public function changepass(){
        return redirect('admin/Loginadmin/changepass');
    }
}
