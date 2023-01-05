<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kupon','jenisproduk_id','expired_kupon','deskripsi_kupon','status'];

    public function jenisproduk(){
        return $this->belongsTo('App\Models\Jenisproduk');
    }
}
