<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $checkoutController;
    public function __construct(CheckoutController $checkoutController)
    {
        $this->checkoutController = $checkoutController;
    }

    public function index()
    {
        $data['shipping'] = Address::first();
        $data['provinsi'] = $this->checkoutController->get_province();
        $data['kota'] = $this->checkoutController->get_city($data['shipping']['provinsi_id']);
        return view('dashboard.address', compact('data'));
    }

    public function shippingUpdate(Request $request)
    {
        Address::first()->update($request->only('provinsi_id','province_id'));
        return back()->with('success',__('message.update'));
    }
}
