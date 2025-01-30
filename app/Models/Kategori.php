<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'Kategori';
    protected $primaryKey = 'Kategori_id';
    public $timestamps = false;
    protected $fillable = [
        'Nama_kategori'
    ];

    public function aset()
    {
        return $this->hasMany(Aset::class, 'Kategori_id');
    }
}
