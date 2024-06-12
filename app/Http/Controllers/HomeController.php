<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Buy;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('welcome', ['categories' => $categories]);    
    }
    public function open_category($category_name)
    {
        $category = Category::with('products')->where('link', $category_name)->first();
        return view('category', ['category' => $category]);    
    }

    public function open_product($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('product', ['product' => $product]);
    }
    public function buy_product($product_id)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $product_id,
        ];
        Buy::create($data);
        
        return redirect(route('profile'));
    }
}
