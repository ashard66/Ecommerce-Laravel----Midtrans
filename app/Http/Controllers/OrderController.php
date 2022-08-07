<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;

class OrderController extends Controller
{
    protected $invoice;
    protected $orderDetail;
    public function __construct(OrderDetail $orderDetail)
    {
        $this->orderDetail = $orderDetail;
    }

    public function index($status = null)
    {
        $dataOrder = OrderDetail::all();
        if($status == null){
            $data = $this->orderDetail->get();
        }else{
            $data = $this->orderDetail->Query()->where('status',$status)->get();
        }
        return view('transaction', compact('dataOrder', 'data'));
    }

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

        $orderItem = Cart::where('user_id', Auth::id())->get();
        foreach($orderItem as $item) {
            Order::create([
                'order_id' => $dataOrder->id,
                'product_id' => $item->product_id,
                'jumlah_pesanan' => $item->jumlah_product
            ]);
        }

        $cartItem = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItem);

        return redirect()->route('order');
    }

    public function show($invoice)
    {
        $orderDetail = $this->orderDetail->Query()->where('invoice', $invoice)->first();
        $snapToken = $orderDetail->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
            $midtrans = new CreateSnapTokenService($orderDetail);
            $snapToken = $midtrans->getSnapToken();
            $orderDetail->snap_token = $snapToken;
            $orderDetail->save();
        }
 
        return view('transactionShow', compact('orderDetail', 'snapToken'));
    }
}
