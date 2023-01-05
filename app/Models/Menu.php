<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // use HasFactory;
    protected $fillable = ['category_produk','jenis_produk', 'nama_produk','bahan_produk','deskripsi_produk','harga_produk','stok_produk','gambar'];
}
