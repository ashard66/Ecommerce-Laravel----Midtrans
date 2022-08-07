<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'order_id',
        'product_id',
        'jumlah_pesanan'
    ];

    public function OrderDetail()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
