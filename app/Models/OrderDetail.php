<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $appends = ['status_name','status_name_text','one_product','array_product'];
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
      'resi'
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function Order()
    {
        return $this->hasMany(Order::class,'order_id','id');
    }

    public function getStatusNameTextAttribute()
    {
        $status = $this->status;
        if($status == 0){
            return 'Pending';
        }elseif($status == 1){
            return 'Dikemas';
        }elseif($status == 2){
            return 'Dikirim';
        }elseif($status == 3){
            return 'Selesai';
        }elseif($status == 4){
            return 'Dibatalkan';
        }else{
            return 'Kadaluarsa';
        }
    }

    public function getStatusNameAttribute()
    {
        $status = [
            '0' => '<div class="badge badge-warning">Menunggu Pembayaran</div>',
            '1' => '<div class="badge badge-primary">Dikemas</div>',
            '2' => '<div class="badge badge-info">Dikirim</div>',
            '3' => '<div class="badge badge-success">Selesai</div>',
            '4' => '<div class="badge badge-secondary">Dibatalkan</div>',
            '5' => '<div class="badge badge-secondary">Kadaluarsa</div>',
        ];
        return $status[$this->status];
    }

    public function getOneProductAttribute()
    {
        $product = $this->Order[0]->product->nama;
        if($this->Order()->count() > 1){
            $product .= ' & ' . $this->Order()->count() . 'produk lainnya';
        }
        return $product;
    }

    public function getArrayProductAttribute()
    {
        $product = [];
        foreach($this->Order()->get() as $detail){
            array_push($product,[
                'id' => $detail->product->id,
                'harga' => $detail->product->harga,
                'jumlah_pesanan' => $detail->jumlah_pesanan,
                'name' => $detail->product->nama,
            ]);
        }
        return $product;
    }

}
