<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghapusan_aset extends Model
{
    protected $table = 'Penghapusan_aset';
    protected $primaryKey = 'Penghapusan_id';
    public $timestamps = false;
    protected $fillable = [
        'Tgl_penghapusan',
        'Keterangan',
        'Aset_id'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'Aset_id');
    }
}
