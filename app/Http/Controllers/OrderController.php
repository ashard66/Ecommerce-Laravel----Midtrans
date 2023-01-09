<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Order\OrderService;

class OrderController extends Controller
{
    protected $invoice;
    protected $orderDetail;
    protected $orderService;

    public function __construct(OrderDetail $orderDetail, OrderService $orderService)
    {
        $this->orderDetail = $orderDetail;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $data['order'] = $this->orderService->getUserOrder(auth()->user()->id);
        return view('transaction', compact('data'));
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

        $stok = Product::where('id', $item->product_id)->first();
        $stok->stok = $stok->stok - $item->jumlah_product;
        $stok->update();

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

    public function received($invoice)
    {
        $this->orderDetail->Query()->where('invoice',$invoice)->first()->update(['status' => 3]);
        return back();
    }

    public function canceled($invoice)
    {
        $this->orderDetail->Query()->where('invoice',$invoice)->first()->update(['status' => 4]);
        return back();
    }
}
