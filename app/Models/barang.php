<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = "tb_barang";
    protected $fillable = [
        'jenis_barang',
        'nama_barang',
        'stok_barang',
        'harga_jual',
        'total',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_barang';
    public $timestamps = false;
}
