<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghapusan_aset extends Model
{
    protected $table = 'Penghapusan_aset';
    protected $primaryKey = 'penghapusan_id';
    public $timestamps = false;
    protected $fillable = [
        'Tgl_penghapusan',
        'Status_penghapusan',
        'Jml_dihapus',
        'Upload_File',
        'Upload_Foto',
        'Aset_id'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'Aset_id');
    }
}
