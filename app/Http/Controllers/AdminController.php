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
    public function delete($product_id)
    {
        Product::where('id', $product_id)->delete();
        return redirect(route('profile'));
    }
    public function open_edit_product($product_id)
    {
        $categories = Category::get();
        $info = Product::where('id', $product_id)->first();
        return view('edit', ['product' => $info, 'categories' => $categories]);
    }

    public function edit_product($product_id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ];
        Product::where('id', $product_id)->update($data);
        return redirect()->back();
    }
}
