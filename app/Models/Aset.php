<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'Aset';
    protected $primaryKey = 'Aset_id';
    public $timestamps = false;
    protected $fillable = [
        'Nm_aset',
        'Kategori',
        'Merk',
        'Tahun_perolehan',
        'Harga',
        'Ruang_id'
    ];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'Ruang_id');
    }

    public function penyusutan()
    {
        return $this->hasMany(Penyusutan::class, 'Aset_id');
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'Aset_id');
    }
}
