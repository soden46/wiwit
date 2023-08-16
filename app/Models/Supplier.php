<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $table = "tb_supplier";
    protected $fillable = [
        'nama_supplier',
        'alamat',
        'no_telp',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_supplier';
}
