<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile');    
    }
    public function avatar(Request $request)
    {
        $validated = $request->validate([
            'avatar_change' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        
        $user = User::where('id', Auth::user()->id)->first();
        $photoPath = $user->photo;
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $name = time(). ".". $request->file('avatar_change')->extension();
        $destination = 'public/avatars';
        $path = $request->file('avatar_change')->storeAs($destination, $name);
        User::where('id', Auth::user()->id)->update([
            'photo' => 'storage/avatars/' . $name
        ]);
    
        return redirect()->back();
    }
}
