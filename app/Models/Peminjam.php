<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'Peminjam';
    protected $primaryKey = 'Peminjam_id';
    protected $fillable = [
        'Nama_peminjam',
        'No_HP',
    ];
    public $timestamps = false;
    public function pinjam()
    {
        return $this->hasMany('App\Models\Pinjam', 'id_peminjam');
    }
    public function kembali()
    {
        return $this->hasMany('App\Models\Kembali', 'id_peminjam');
    }
}
