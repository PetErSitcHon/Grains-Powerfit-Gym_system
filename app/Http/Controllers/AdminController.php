<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;



class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    } 

    public function AdminRegister(){
        return view('admin.admin_register');
    } 

    public function Login(Request $request){   

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin.dashboard');
        } else {
            // Authentication failed...
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }

            // $data = $request->all();
            // if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            //     return redirect('admin.dashboard');
            // } else {
            //     return redirect()->back()->with('error', 'Invalid Email or Password');
            // }

    }

      
    
    public function store(Request $request)
    {
        $admin = Admin::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return view('admin.admin_login');
     
    }

    public function Dashboard(){
        $user = User::get();
        return view('admin.dashboard', compact('user'));
    }
}
