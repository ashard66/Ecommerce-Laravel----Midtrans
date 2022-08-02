<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderDetail(Request $request)
    {
        $subtotal = $request['totalbelanja'];
        $total = $subtotal + $request['shipping_cost'];
        $dataOrder = OrderDetail::create([
            'invoice' => strtoupper(Str::random('6')),
            'total_harga' => $total,
            'nama' => $request['nama'],
            'destination' =>  $request['kota_id'] . ', ' . $request['provinsi_id'] ,
            'alamat' => $request['alamat'],
            'kurir' => $request['kurir'],
            'subtotal' => $subtotal,
            'shipping_cost' => $request['shipping_cost'],
            'layanan' => $request['layanan'],
            'berat' => $request['berat'],
            'status' => 0,
            'user_id' => auth()->user()->id,
            'phone' => $request['phone']
        ]);
        $dataOrder->save();
        return view('transaction');
    }
}
