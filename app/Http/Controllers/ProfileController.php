<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Basket;
use App\Models\Buy;

class ProfileController extends Controller
{
    public function profile()
    {
        $buy_product = Buy::with('product')->where('user_id', Auth::user()->id)->get();
        return view('profile', ['buy_product'=>$buy_product]);    
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
    public function edit_name(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
        ]);
        User::where('id', Auth::user()->id)->update(['name' => $request->username]);
        return redirect()->back();
    }

    public function basket_open()
    {
        $basket = Basket::with('product')->where('user_id', Auth::user()->id)->get();
        return view('basket', ['basket' => $basket]);
    }

    public function add_basket($tovar_id)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $tovar_id,
        ];
        Basket::create($data);
        return redirect()->back();
    }
}
