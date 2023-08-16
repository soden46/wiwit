<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public $table = "tb_penjualan_barang";
    protected $fillable = [
        'id_user',
        'id_pengiriman',
        'id_customer',
        'id_barang',
        'jenis_barang',
        'tanggal_beli',
        'banyak_beli',
        'harga',
        'total_pembelian',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_penjualan';
    public $timestamps = false;
}
