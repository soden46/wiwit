<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = "tabel_customer";
    protected $fillable = [
        'nama_customer',
        'email',
        'alamat',
        'No_telp',
        'jenis_kelami',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_customer';
    public $timestamps = false;
}
