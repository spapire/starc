<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;



class RegisterSellerController extends Controller
{
    public function show() {
        return view('auth.register-seller');
    }

    public function register(Request $request) {
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|email',
          'phone' => 'required|string',
      ]);
  
      $user = Auth::user();
      if (!$user) {
          return redirect()->route('login')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
      }
  
      // Cegah double seller
      if ($user->store) {
          return redirect()->back()->withErrors(['msg' => 'Kamu sudah mendaftar sebagai seller.']);
      }
  
      Store::create([
          'id' => (string) Str::uuid(),
          'user_id' => $user->id,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
      ]);
  
      $roleId = Role::where('name', 'seller')->value('id');
      if ($roleId) {
          $user->roles()->attach($roleId);
      }
  
      return redirect()->route('dashboard')->with('success', 'Toko berhasil dibuat!');
  }  
}
