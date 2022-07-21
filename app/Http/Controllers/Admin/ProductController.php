<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $product = Product::all();
        return view('dashboard.product.index', compact('product'));
    }

    public function add()
    {
        $category = Category::all();
        return view('dashboard.product.add', compact('category'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('file/', $filename);
            $product->gambar = $filename;
        }
        $product->id_categories = $request->input('id_categories');
        $product->nama = $request->input('nama');
        $product->harga = $request->input('harga');
        $product->keterangan = $request->input('keterangan');
        $product->stok = $request->input('stok');
        $product->berat = $request->input('berat');

        $product->save();
        return redirect()->route('product');
    }
}

