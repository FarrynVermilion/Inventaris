<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aset_dihanguskan extends Model
{
    protected $table = 'aset_dihanguskan';
    protected $primaryKey = 'dihanguskan_id';
    public $timestamps = false;

    protected $fillable = [
        'Tgl_dihanguskan',
        'Deskripsi',
        'penghapusan_id',
    ];
}
