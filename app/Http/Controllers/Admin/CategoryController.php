<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::all();
        return view('dashboard.category.index', compact('category'));
    }

    public function add()
    {
        return view('dashboard.category.add');
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'nama' => request('nama')
        ]);
        $category->save();
        return redirect()->route('add.category');
    }
}
