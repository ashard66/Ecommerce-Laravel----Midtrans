<?php
 
namespace App\Services\Midtrans;
 
use Midtrans\Snap;
use App\Models\OrderDetail;
 
class CreateSnapTokenService extends Midtrans
{
    protected $order;
 
    public function __construct($order)
    {
        parent::__construct();
 
        $this->order = $order;
    }
 
    public function getSnapToken()
    {
        $orderDetail = OrderDetail::find($id);
        $params = [
            'transaction_details' => [
                'order_id' => $orderDetail->invoice,
                'gross_amount' => $orderDetail->total_harga,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $orderDetail->phone,
            ]
        ];
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}