<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'Peminjaman';
    protected $primaryKey = 'Pinjam_id';
    protected $fillable = [
        'Peminjam_id',
        'Tgl_pinjam',
        'Tgl_harus_kembali',
    ];

    public $timestamps = false;
}
