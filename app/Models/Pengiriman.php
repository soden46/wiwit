<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    public $table = "tb_beban_pengiriman";
    protected $fillable = [
        'id_pengiriman',
        'id_barang',
        'biaya_pengiriman',
        'sub_total_pengiriman',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_pengiriman';
    public $timestamps = false;
}
