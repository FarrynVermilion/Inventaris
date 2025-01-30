<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jual_aset extends Model
{
    protected $table = 'Jual_aset';
    protected $primaryKey = 'Jual_id';
    public $timestamps = false;
    protected $fillable = [
        'Tgl_jual',
        'Harga_jual',
        'Aset_id'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'Aset_id');
    }
}
