<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Charts\SalesChart;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $salesChart;

    public function __construct(SalesChart $salesChart)
    {
        $this->salesChart = $salesChart;
    }
    public function index()
    {
        $data['total_product'] = Product::count();
        $data['total_user'] = User::count();
        $data['total_pending'] = OrderDetail::where('status',0)->whereMonth('created_at', Date('m'))->whereYear('created_at',Date('Y'))->count();
        $data['total_shipping'] = OrderDetail::where('status',2)->whereMonth('created_at', Date('m'))->whereYear('created_at',Date('Y'))->count();
        $data['total_completed'] = OrderDetail::where('status',3)->whereMonth('created_at', Date('m'))->whereYear('created_at',Date('Y'))->count();
        $data['total_order'] = $data['total_pending'] + $data['total_shipping'] + $data['total_completed'];
        $data['last_order'] = OrderDetail::orderBy('id','DESC')->limit(5)->get();
        $data['chart'] = $this->salesChart->build();
        return view('dashboard.index', compact('data'));
    }
}
