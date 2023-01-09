<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $data['latest_product'] = $this->product->query()->limit(8)->get();
        return view('home', compact('data'));
    }

    public function shop()
    {
        $category = Category::all();
        $product = Product::paginate(9);
        return view('shop', compact('product', 'category'));
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $data['product'] = $this->product->where('nama', 'LIKE', "%" .$cari. "%")->paginate();
        return view('search', compact('data'));
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
