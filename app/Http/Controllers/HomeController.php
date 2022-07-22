<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function shop()
    {
        $category = Category::all();
        $product = Product::all();
        return view('shop', compact('product', 'category'));
    }

    public function viewcategory($id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::where('id',$id)->first();
            $product = Product::where('id_categories', $category->id)->get();
            return view('category', compact('category', 'product'));
        }
        else {
            return redirect('/');
        }
        
    }

    public function productdetail($id)
    {
        $product = Product::find($id);
        return view('productDetail', compact('product'));
    }
}
