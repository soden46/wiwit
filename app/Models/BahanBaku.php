<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    public $table = "tb_bahanbaku";
    protected $fillable = [
        'nama_bahanbaku',
        'jenis_bahanbaku',
    ];
    protected $primaryKey = 'id_bahanbaku';
    public $timestamps = false;
}
