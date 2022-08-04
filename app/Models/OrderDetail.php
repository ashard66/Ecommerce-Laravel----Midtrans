<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
      'invoice',
      'status',
      'total_harga',
      'user_id',
      'subtotal',
      'shipping_cost',
      'berat',
      'nama',
      'phone',
      'kurir',
      'destination',
      'alamat',
      'layanan',
    ];
}