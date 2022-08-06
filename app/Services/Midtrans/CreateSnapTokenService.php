<?php
 
namespace App\Services\Midtrans;
 
use Midtrans\Snap;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
 
class CreateSnapTokenService extends Midtrans
{
    protected $orderDetail;
 
    public function __construct($orderDetail)
    {
        parent::__construct();
 
        $this->orderDetail = $orderDetail;
    }
 
    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->orderDetail->invoice,
                'gross_amount' => $this->orderDetail->total_harga,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $this->orderDetail->phone,
            ]
        ];
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}