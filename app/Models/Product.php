<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_produk',
        'deskripsi_produk',
        'harga',
        'id_kategori',
        'id_supplier',
        'gambar',
    ];
}
