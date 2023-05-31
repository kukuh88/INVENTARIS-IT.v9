<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $guarded = ['id'];
    protected $fillable = [
        'kode_barang', 
        'kategori_barang',
        'status_barang',
        'status',
        'nama_barang',
        'kt_barang',
        'no_serial',
        'tgl_masuk',
        'terima_dari',
        'lokasi',
        'anydesk', 
        'kt_email', 
        'kp_name' 
    ];

    
}
