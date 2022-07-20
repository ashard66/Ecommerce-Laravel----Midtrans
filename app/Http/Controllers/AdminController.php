<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function product()
    {
        Product::get();
        return view('dashboard.product.index');
    }
}
