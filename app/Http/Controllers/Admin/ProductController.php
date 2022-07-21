<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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

    public function edit($id)
    {
        $product = Product::find($id);
        return view('dashboard.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('gambar')) 
        {
            $path = 'file/'.$product->gambar;
            if (File::exists($path)) 
            {
                File::delete($path);
            }
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('file/', $filename);
            $product->gambar = $filename;
        }
        // $product->id_categories = $request->input('id_categories');
        $product->nama = $request->input('nama');
        $product->harga = $request->input('harga');
        $product->keterangan = $request->input('keterangan');
        $product->stok = $request->input('stok');
        $product->berat = $request->input('berat');

        $product->save();
        return redirect()->route('product');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $path = 'file/'.$product->gambar;
            if (File::exists($path)) 
            {
                File::delete($path);
            }
        $product->delete();
        return redirect()->route('product');
    }
}

