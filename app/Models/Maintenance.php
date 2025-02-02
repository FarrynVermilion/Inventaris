<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'Maintenance';
    protected $primaryKey = 'maintenance_id';
    public $timestamps = false;
    protected $fillable = [
        'Tgl_maintenance',
        'Jenis_maintenance',
        'Deskripsi',
        'Biaya',
        'Nm_teknisi',
        'Aset_id'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'Aset_id');
    }
}
