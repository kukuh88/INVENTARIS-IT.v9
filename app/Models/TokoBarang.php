<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoBarang extends Model
{
    use HasFactory;
    protected $table = 'toko_barang';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama_toko',
        'alamat_toko',
        'nomor_hp',
    ];
}
