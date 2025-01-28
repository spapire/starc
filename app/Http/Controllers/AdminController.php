<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }
    public function Dashboard(){
        return view('admin.index');
    }
    public function Login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Autentikasi admin
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('admin.dashboard')->with('success', 'Admin Logged in Successfully');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }
    
}
