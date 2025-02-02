<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'Ruang';
    protected $primaryKey = 'Ruang_id';
    public $timestamps = false;
    protected $fillable = [
        'Nm_ruang',
        'Lokasi'
    ];

    public function aset()
    {
        return $this->hasMany(Aset::class, 'Ruang_id');
    }
}
