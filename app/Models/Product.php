<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id_categories',
        'nama',
        'harga',
        'keterangan',
        'stok',
        'gambar',
        'berat'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categories', 'id');
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
