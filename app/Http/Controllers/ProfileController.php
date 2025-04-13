<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        // $likedProducts = $user->likedProducts()->with('product')->get();
        // $comments = $user->comments()->with('product')->latest()->get(); // butuh relasi user->comments()

        return view('profile.home', compact('user'
        // , 'likedProducts', 'comments'
    ));
    }

    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('profile_photo')) {
            // Delete old photo
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo);
            }

            $path = $request->file('profile_photo')->store('profile_photos');
            $user->profile_photo = $path;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('profile.home')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}
