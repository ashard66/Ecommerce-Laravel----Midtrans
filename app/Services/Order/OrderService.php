<?php
namespace App\Services\Order;

use App\Models\OrderDetail;

class OrderService{

    protected $orderDetail;
    public function __construct(OrderDetail $orderDetail)
    {
        $this->orderDetail = $orderDetail;
    }

    public function getUserOrder($user_id)
    {
        return $this->orderDetail->Query()->where('user_id',$user_id)->orderBy('id','desc')->get();
    }

}