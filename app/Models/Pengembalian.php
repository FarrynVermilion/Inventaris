<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'Pengembalian';
    protected $primaryKey = 'Kembali_id';
    protected $fillable = [
        'Pinjam_id',
        'Tgl_kembali',
        'Penerima'
    ];

    public $timestamps = false;
}
