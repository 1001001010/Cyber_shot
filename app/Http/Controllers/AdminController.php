<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin', ['categories' => $categories]);
    }

    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048'
        ]);

        $name = time(). "." . $request->photo->extension();
        $destination = 'public/products';
        $path = $request->photo->storeAs($destination, $name);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'photo' => 'storage/products/' . $name
        ];
        Product::create($data);

        return redirect()->back();
    }
}
