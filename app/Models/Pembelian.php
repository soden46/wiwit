<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    public $table = "tb_pembelian";
    protected $fillable = [
        'id_supplier',
        'id_admin',
        'id_bahanbaku',
        'tanggal_beli',
        'banyak_beli',
        'harga',
        'total_pembelian',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_pembelian';
    public $timestamps = false;
}
